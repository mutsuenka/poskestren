<?php

namespace App\Http\Controllers;

use App\Models\MasterStatusVisit;
use App\Models\Pasien;
use App\Models\Visit;
use App\Notifications\sendPrescriptionNotification;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::where('tanggal_visit', Carbon::today())
            ->orderBy('status', 'ASC')
            ->orderBy('no_antrian', 'ASC')
            ->paginate();

        $today = Carbon::today()->format('d M Y');


        foreach ($visits as $visit) {
            $status = MasterStatusVisit::where('id', $visit->status)->get();

            $visit['nama_status'] = $status[0]->nama_status;

        }

        return view('visit.index', compact('visits', 'today'));
    }

    public function create()
    {
        $pasiens = Pasien::whereNull('deleted_at')->get();

        $statuses = MasterStatusVisit::all();

        return view('visit.create', compact('pasiens', 'statuses'));
    }

    public function store(Request $request)
    {
        $visit_initial = new Visit();
        $input = $request->all();

        $no_antrian = Visit::where('tanggal_visit', $input['tanggal_visit'])->count();


        $visit_initial->pasien_id = $input['pasien_id'];
        $visit_initial->tanggal_visit = $input['tanggal_visit'];
        $visit_initial->no_antrian = $no_antrian + 1;
        $visit_initial->status = $input['status'];

        $visit_initial->save();

        return to_route('visit.index')->with('status', 'success')->with('message', 'Antrian dengan nomor antrian' . $visit_initial->no_antrian . ' telah ditambahkan');
    }

    public function show(Visit $visit)
    {
        $pasien = $visit->pasien;

        $visit->pasien_age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun');

        $visit->jenis_kelamin = $pasien->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';

        return view('visit.show', compact('visit'));
    }

    public function edit(Visit $visit, string $type)
    {
        switch ($type) {
            case 'vital':
                $view = 'visit.edit-vital';
                break;
            case 'visit':
                $view = 'visit.edit-visit';
                break;
            default:
                $view = 'visit.edit';
                break;
        }

        $pasien = Pasien::find($visit->pasien_id);

        $visit->pasien_age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun');

        $visit->jenis_kelamin = $pasien->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';


        return view($view, compact('visit'));
    }

    public function update(Request $request, Visit $visit, string $type)
    {
        $input = $request->all();

        if ($type == 'vital') {
            $visit->vital_tekanan_darah = $input['vital_tekanan_darah'];
            $visit->vital_nadi = $input['vital_nadi'];
            $visit->vital_suhu = $input['vital_suhu'];
            $visit->vital_respiratory_rate = $input['vital_respiratory_rate'];
            $visit->vital_spo = $input['vital_spo'];
            $visit->vital_vas = $input['vital_vas'];
            $visit->vital_gcs = $input['vital_gcs'];
            $visit->vital_berat_badan = $input['vital_berat_badan'];
            $visit->vital_tinggi_badan = $input['vital_tinggi_badan'];
            $visit->status = 2;
            $visit->save();

            session()->flash('status', 'success');
            session()->flash('message', 'Data vital berhasil disimpan.');
        } else {
            $visit->keluhan_utama = $input['keluhan_utama'];
            $visit->riwayat_penyakit_dulu = $input['riwayat_penyakit_dulu'];
            $visit->riwayat_penyakit_sekarang = $input['riwayat_penyakit_sekarang'];
            $visit->riwayat_penyakit_keluarga = $input['riwayat_penyakit_keluarga'];
            $visit->sg_kepala_leher = $input['sg_kepala_leher'];
            $visit->sg_thorax = $input['sg_thorax'];
            $visit->sg_cob = $input['sg_cob'];
            $visit->sg_abdomen = $input['sg_abdomen'];
            $visit->sg_ekstremitas = $input['sg_ekstremitas'];
            $visit->status_lokalis = $input['status_lokalis'];
            $visit->diagnosa = $input['diagnosa'];
            $visit->planning = $input['planning'];
            $visit->status = 4;
            $visit->nama_dokter = auth()->user()->name;
            $visit->save();

            session()->flash('status', 'success');
            session()->flash('message', 'Pengecekan pasien sudah selesai, data pasien berhasil disimpan.');

            $prescription = [
                'nama_lengkap' => $visit->pasien->nama_lengkap,
                'plan' => $visit->planning
            ];

            $visit->notify(new sendPrescriptionNotification($prescription));

        }

        return to_route('visit.index');
    }

    public function farmasi()
    {
        $visits = Visit::where('status', 4)
            ->where('tanggal_visit', Carbon::today())
            ->paginate();
        $today = Carbon::today()->format('d M Y');

        foreach ($visits as $visit) {
            $status = MasterStatusVisit::where('id', $visit->status)->get();

            $visit['nama_status'] = $status[0]->nama_status;

        }

        return view('visit.farmasi', compact('visits', 'today'));
    }

    public function panggil(Visit $visit)
    {
        $visit->status = 3;
        $visit->save();

        return to_route('visit.index')->with('status', 'success')->with('message', 'Nomor Antrian ' . $visit->no_antrian . ' atas nama ' . $visit->pasien->nama_lengkap . ' dalam proses pemeriksaan dokter');
    }

    public function noShow(Visit $visit)
    {
        $visit->status = 6;
        $visit->save();

        return to_route('visit.index')->with('status', 'success')->with('message', 'Nomor Antrian ' . $visit->no_antrian . ' atas nama ' . $visit->pasien->nama_lengkap . ' dinyatakan no show');
    }

    public function serahkanObat(Visit $visit)
    {
        $visit->status = 5;
        $visit->save();

        return to_route('visit.farmasi')->with('status', 'success')->with('message', 'Obat pasien ' . $visit->pasien->nama_lengkap . ' telah diserahkan.');
    }
}
