<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Pasien;
use App\Exports\PasienExport;
use App\Models\MasterStatusVisit;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorePasienRequest;
use App\Http\Requests\UpdatePasienRequest;
use Illuminate\Notifications\Notification;
use Symfony\Component\HttpFoundation\Request;
use App\Notifications\sendPrescriptionNotification;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword) {
            $pasiens = Pasien::search($keyword)->paginate(7);
        } else {
            $pasiens = Pasien::paginate(7);
        }

        $pasiens->keyword = $keyword;

        foreach ($pasiens as $pasien) {

            $pasien->age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun, %m bulan');

            $pasien->dob = Carbon::parse($pasien->dob)->translatedFormat('d F Y');

            $pasien->jumlah_visit = Visit::where('pasien_id', $pasien->id)->get()->count();

        }

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        $totalPasien = Pasien::whereNull('deleted_at')->get()->count();
        $totalPasienTahun = Pasien::whereYear('created_at', $year)->get()->count();
        $totalPasienBulan = Pasien::whereMonth('created_at', $month)->get()->count();

        setlocale(LC_TIME, 'id_ID');
        $monthYear = Carbon::now()->formatLocalized('%B %Y');

        return view('pasien.index', compact('pasiens', 'year', 'monthYear', 'totalPasien', 'totalPasienTahun', 'totalPasienBulan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePasienRequest  $request
     */
    public function store(StorePasienRequest $request)
    {
        $lastNoRM = Pasien::where('kategori', $request->kategori)->count('id');
        // dd($lastNoRM);
        $currentRM = $lastNoRM + 1;
        $format = "%04d";
        $currentRM = sprintf($format, $currentRM);

        switch ($request->kategori) {
            case 'Santri':
                $prefixRM = 'S';
                break;
            case 'Asatidzah':
                $prefixRM = 'A';
                break;
            default:
                $prefixRM = 'U';
                break;
        }

        $NoRM = $prefixRM . '-' . $currentRM;
        // dd($NoRM);

        $validatedData = $request->validated();
        $validatedData['no_rekam_medis'] = $NoRM;
        $validatedData['dob'] = Carbon::parse($request->dob);

        Pasien::create($validatedData);

        return to_route('pasien.index')->with('message', 'Rekam Medis Pasien berhasil dibuat.')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     */
    public function show(Pasien $pasien)
    {
        $pasien->age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun');

        $pasien->jenis_kelamin == 1 ? $pasien->jenis_kelamin = 'Laki-laki' : $pasien->jenis_kelamin = 'Perempuan';

        $pasien->status_kawin == 1 ? $pasien->status_kawin = 'Sudah' : $pasien->status_kawin = 'Belum';

        $pasien->dob = Carbon::parse($pasien->dob)->format('d M Y');

        $pasien_age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun');

        $jenis_kelamin = $pasien->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';

        $visits = Visit::where('pasien_id', $pasien->id)->paginate();

        foreach ($visits as $visit) {
            $status = MasterStatusVisit::where('id', $visit->status)->get();

            $visit['nama_status'] = $status[0]->nama_status;

            $visit->pasien_age = $pasien_age;

            $visit->jenis_kelamin = $jenis_kelamin;

        }

        return view('pasien.show', compact('pasien', 'visits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     */
    public function edit(Pasien $pasien)
    {
        $pasien->age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun %m bulan');

        $pasien->dob = Carbon::parse($pasien->dob)->format('d M Y');

        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePasienRequest  $request
     * @param  \App\Models\Pasien  $pasien
     */
    public function update(UpdatePasienRequest $request, Pasien $pasien)
    {
        $validatedData = $request->validated();
        $validatedData['dob'] = Carbon::parse($request->dob);

        $pasien->update($validatedData);

        return to_route('pasien.index')->with('status', 'success')->with('message', 'Data pasien berhasil di-update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     */
    public function destroy(Pasien $pasien)
    {
        $dataVisitPasien = Visit::where('pasien_id', $pasien->id)->get()->count();

        if ($dataVisitPasien == 0) {
            $pasien->delete();
            return to_route('pasien.index')->with('status', 'success')->with('message', 'Data pasien berhasil dihapus');
        }

        return to_route('pasien.index')->with('message', 'Data pasien tidak bisa dihapus');
    }

    public function export()
    {
        return Excel::download(new PasienExport, 'DataPasien.xlsx');
    }
}
