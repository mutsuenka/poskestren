<?php

namespace App\Http\Controllers;

use App\Models\MasterStatusVisit;
use App\Models\Pasien;
use App\Models\Visit;
use App\Notifications\sendPrescriptionNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword) {
            $visits = Visit::with('pasien')
                ->where('tanggal_visit', Carbon::today())
                ->where(function($query) use ($keyword) {
                    $query->where('no_antrian', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('status', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('pasien', function($query) use ($keyword){
                            $query->where('nama_lengkap', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('no_rekam_medis', 'LIKE', '%'.$keyword.'%');
                        });
                })
                // ->orderBy('status', 'ASC')
                ->orderBy('no_antrian', 'ASC')
                ->paginate();
        } else {
            $visits = Visit::where('tanggal_visit', Carbon::today())
                // ->orderBy('status', 'ASC')
                ->orderBy('no_antrian', 'ASC')
                ->paginate();
        }

        $visits->keyword = $keyword;

        $totalPasien = count($visits);

        $totalPasienSelesai = $visits->where('status', 5)->count();

        $today = Carbon::today()->translatedFormat('d F Y');


        foreach ($visits as $visit) {
            $status = MasterStatusVisit::where('id', $visit->status)->get();

            $visit['nama_status'] = $status[0]->nama_status;

        }

        // dd($visits->count());

        return view('visit.index', compact('visits', 'today', 'totalPasien', 'totalPasienSelesai'));
    }

    public function indexAll(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword) {
            $visits = Visit::with('pasien')
                ->where(function($query) use ($keyword) {
                    $query->where('no_antrian', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('status', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('pasien', function($query) use ($keyword){
                            $query->where('nama_lengkap', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('no_rekam_medis', 'LIKE', '%'.$keyword.'%');
                        });
                })
                ->orderBy('id', 'DESC')
                ->paginate();
        } else {
            $visits = Visit::orderBy('id', 'DESC')
                ->paginate();
        }

        return view('visit.log', compact('visits', 'keyword'));

    }

    public function create()
    {
        $pasiens = Pasien::whereNull('deleted_at')->get();

        foreach ($pasiens as $pasien) {
            $pasien->age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun');
        }

        return view('visit.create', compact('pasiens'));
    }

    public function store(Request $request)
    {
        $visit_initial = new Visit();
        $input = $request->all();

        $today = Carbon::today();

        $no_antrian = Visit::where('tanggal_visit', $today)->count();
        // dd($no_antrian);

        $data_pasien = json_decode($input['pasien']);
        // dd($data_pasien);

        $visit_initial->pasien_id = $data_pasien->id;
        $visit_initial->tanggal_visit = $today;
        $visit_initial->no_antrian = $no_antrian + 1;
        $visit_initial->status = MasterStatusVisit::DALAM_ANTRIAN;

        $visit_initial->save();

        return to_route('visit.index')->with('status', 'success')->with('message', 'Antrian dengan nomor antrian ' . $visit_initial->no_antrian . ' telah ditambahkan');
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
        if ($type == 'vital') {
            $view = 'visit.edit-vital';
        } else {
            $view = 'visit.edit-visit';
        }

        $pasien = Pasien::find($visit->pasien_id);

        $visit->pasien_age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun');

        $visit->jenis_kelamin = $pasien->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';


        return view($view, compact('visit'));
    }

    public function updatePemeriksaan(Request $request, Visit $visit)
    {
        $input = $request->all();

        $visit->keluhan_utama = $input['keluhan_utama'];
        $visit->riwayat_penyakit_dulu = $input['riwayat_penyakit_dulu'];
        $visit->riwayat_penyakit_sekarang = $input['riwayat_penyakit_sekarang'];
        $visit->riwayat_penyakit_keluarga = $input['riwayat_penyakit_keluarga'];
        $visit->sg_kepala_leher = $input['sg_kepala_leher'];
        $visit->sg_thorax = $input['sg_thorax'];
        $visit->sg_cor = $input['sg_cor'];
        $visit->sg_pulmo = $input['sg_pulmo'];
        $visit->sg_abdomen = $input['sg_abdomen'];
        $visit->sg_ekstremitas = $input['sg_ekstremitas'];
        $visit->status_lokalis = $input['status_lokalis'];
        $visit->diagnosa = $input['diagnosa'];
        $visit->planning = $input['planning'];
        if ($visit->status <= 3) {
            $visit->status = 4;
        }
        $visit->nama_dokter = auth()->user()->name;
        $visit->save();

        if ($visit->planning != $input['planning']) {

            $prescription = [
                'nama_lengkap' => $visit->pasien->nama_lengkap,
                'plan' => $visit->planning
            ];

            $visit->notify(new sendPrescriptionNotification($prescription));
        }

        return to_route('visit.index')->with('status', 'success')->with('message', 'Pemeriksaan pasien sudah selesai, data pasien berhasil disimpan.');
    }

    public function updateVitalSign(Request $request, Visit $visit)
    {
        $input = $request->all();

        $request->validate([
            'vital_tekanan_darah' => 'string|nullable',
            'vital_nadi' => 'numeric|nullable',
            'vital_suhu' => 'string|nullable',
            'vital_respiratory_rate' => 'numeric|nullable',
            'vital_spo' => 'numeric|nullable',
            'vital_vas' => 'numeric|nullable',
            'vital_gcs' => 'numeric|nullable',
            'vital_berat_badan' => 'numeric|nullable',
            'vital_tinggi_badan' => 'numeric|nullable'
        ]);

        $visit->vital_tekanan_darah = $input['vital_tekanan_darah'];
        $visit->vital_nadi = $input['vital_nadi'];
        $visit->vital_suhu = $input['vital_suhu'];
        $visit->vital_respiratory_rate = $input['vital_respiratory_rate'];
        $visit->vital_spo = $input['vital_spo'];
        $visit->vital_vas = $input['vital_vas'];
        $visit->vital_gcs = $input['vital_gcs'];
        $visit->vital_berat_badan = $input['vital_berat_badan'];
        $visit->vital_tinggi_badan = $input['vital_tinggi_badan'];
        if ($visit->status == 1) {
            $visit->status = 2;
        }
        $visit->save();

        session()->flash('status', 'success');
        session()->flash('message', 'Vital Sign berhasil disimpan.');

        return to_route('visit.index');
    }

    /*
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
            session()->flash('message', 'Vital Sign berhasil disimpan.');
        } else {
            $visit->keluhan_utama = $input['keluhan_utama'];
            $visit->riwayat_penyakit_dulu = $input['riwayat_penyakit_dulu'];
            $visit->riwayat_penyakit_sekarang = $input['riwayat_penyakit_sekarang'];
            $visit->riwayat_penyakit_keluarga = $input['riwayat_penyakit_keluarga'];
            $visit->sg_kepala_leher = $input['sg_kepala_leher'];
            $visit->sg_thorax = $input['sg_thorax'];
            $visit->sg_cor = $input['sg_cor'];
            $visit->sg_pulmo = $input['sg_pulmo'];
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
    }*/

    public function farmasi(Request $request)
    {
        $keyword = $request->keyword;

        if ($keyword) {
            $visits = Visit::with('pasien')
                ->where('tanggal_visit', Carbon::today())
                ->where('status', 4)
                ->where(function($query) use ($keyword) {
                    $query->where('no_antrian', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('pasien', function($query) use ($keyword){
                            $query->where('nama_lengkap', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('no_rekam_medis', 'LIKE', '%'.$keyword.'%');
                        });
                })
                ->paginate();
        } else {
            $visits = Visit::where('status', 4)
                ->where('tanggal_visit', Carbon::today())
                ->paginate();
        }

        $visits->keyword = $keyword;


        $today = Carbon::today()->translatedFormat('d F Y');

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

    public function cancel(Visit $visit)
    {
        $visit->status = 6;
        $visit->save();

        return to_route('visit.index')->with('status', 'success')->with('message', 'Nomor Antrian ' . $visit->no_antrian . ' atas nama ' . $visit->pasien->nama_lengkap . ' telah dibatalkan');
    }

    public function kembalikanAntrian(Visit $visit)
    {
        $visit->status = 1;
        $visit->save();

        return to_route('visit.index')->with('status', 'success')->with('message', 'Nomor Antrian ' . $visit->no_antrian . ' atas nama ' . $visit->pasien->nama_lengkap . ' telah kembali ke atrian.');
    }

    public function serahkanObat(Visit $visit)
    {
        $visit->status = 5;
        $visit->save();

        return to_route('visit.farmasi')->with('status', 'success')->with('message', 'Obat pasien ' . $visit->pasien->nama_lengkap . ' telah diserahkan.');
    }
}
