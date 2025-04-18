<?php

namespace App\Http\Controllers;

use App\Exports\VisitExport;
use App\Models\InfoPostren;
use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Models\MasterStatusVisit;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Collection;
use App\Notifications\sendPrescriptionNotification;
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

        $visitHariIni = Visit::where('tanggal_visit', Carbon:: today())
            ->get();

        $visits->keyword = $keyword;

        $totalPasien = count($visitHariIni);

        $totalPasienSelesai = $visitHariIni->where('status', 5)->count();

        $today = Carbon::today()->translatedFormat('d F Y');

        foreach ($visits as $visit) {
            $status = MasterStatusVisit::where('id', $visit->status)->get();
            $age = Carbon::parse($visit->pasien->dob)->diff(Carbon::now())->format('%y tahun');

            $visit['nama_status'] = $status[0]->nama_status;
            $visit['age'] = $age;

        }


        $lastUpdate = InfoPostren::where('id', 1)->value('last_visit_update');

        $lastUpdate = Carbon::parse($lastUpdate)->toDateString();

        if ($lastUpdate != Carbon::today()->toDateString() || is_null($lastUpdate)) {
            self::updateDataNyangkut();
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
                    $query->where('tanggal_visit', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('keluhan_utama', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('diagnosa', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('planning', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('pasien', function($query) use ($keyword){
                            $query->where('nama_lengkap', 'LIKE', '%'.$keyword.'%')
                                ->orWhere('no_rekam_medis', 'LIKE', '%'.$keyword.'%');
                        });
                })
                ->where('status', '<>', 6)
                ->orderBy('id', 'DESC')
                ->paginate(8);
        } else {
            $visits = Visit::orderBy('id', 'DESC')
                ->where('status', '<>', 6)
                ->paginate(5);
        }

        $year = $request->year ? (int)$request->year : Carbon::now()->year;
        $month = $request->month ? (int)$request->month : Carbon::now()->month;

        $totalPerTahun = Visit::whereYear('tanggal_visit', $year)
            ->where('status', '<>', '6')
            ->count();

        $totalPerBulan = Visit::whereMonth('tanggal_visit', $month)
            ->where('status', '<>', '6')
            ->count();

        $month = Carbon::now()->format('F');

        $months = $this->getMonth();

        $years = $this->getYears();

        return view('visit.log', compact('visits', 'keyword', 'totalPerTahun', 'totalPerBulan', 'year', 'month', 'months', 'years'));

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

        $visit_initial->pasien->catatan_terakhir = $visit_initial->pasien->catatan_mendatang;
        $visit_initial->pasien->catatan_mendatang = NULL;
        $visit_initial->pasien->save();

        return to_route('visit.index')->with('status', 'success')->with('message', 'Antrian dengan nomor antrian ' . $visit_initial->no_antrian . ' telah ditambahkan');
    }

    public function show(Visit $visit)
    {
        $pasien = $visit->pasien;

        $visit->pasien_age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun');

        $visit->jenis_kelamin = $pasien->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';

        $riwayat_pasiens = Visit::where('pasien_id', $pasien->id)
            ->latest()
            ->take(3)
            ->get();

        // foreach ($riwayat_pasiens as $riwayat_pasien) {
        //     // dd($riwayat_pasien->planning);
        //     $riwayat_pasien->planning = str_replace("\n", "<br />", $riwayat_pasien->planning);
        //     $riwayat_pasien->keluhan_utama = str_replace("\n", "<br />", $riwayat_pasien->keluhan_utama);
        //     $riwayat_pasien->riwayat_penyakit_dulu = str_replace("\n", "<br />", $riwayat_pasien->riwayat_penyakit_dulu).
        // }

        $riwayat_pasiens = self::convertToBR($riwayat_pasiens);

        return view('visit.show', compact('visit', 'riwayat_pasiens'));
    }

    public function edit(Visit $visit, string $type)
    {


        $pasien = Pasien::find($visit->pasien_id);

        $visit->pasien_age = Carbon::parse($pasien->dob)->diff(Carbon::now())->format('%y tahun');

        $visit->jenis_kelamin = $pasien->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan';



        if ($type == 'vital') {
            $view = 'visit.edit-vital';

            $riwayat_pasiens = [];
        } else {
            $view = 'visit.edit-visit';

            $riwayat_pasiens = Visit::where('pasien_id', $pasien->id)
                ->where('status', 5)
                ->latest()
                ->take(3)
                ->get();



            $riwayat_pasiens = self::convertToBR($riwayat_pasiens);
        }

        // dd($riwayat_pasiens);

        return view($view, compact('visit', 'riwayat_pasiens'));
    }

    public function updatePemeriksaan(Request $request, Visit $visit)
    {
        $input = $request->all();

        $planningOrigin = $visit->planning;

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
        $visit->catatan = $input['catatan'] ?? NULL;
        $visit->pasien->catatan_mendatang = $input['catatan'] ?? NULL;
        if ($visit->status <= 3) {
            $visit->status = 4;
        }
        $visit->nama_dokter = auth()->user()->name;
        $visit->save();
        $visit->pasien->save();



        if ($planningOrigin != $input['planning']) {

            // dd($planningOrigin, $input['planning']);

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

        $visits = self::convertToBr($visits);

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

    public static function getYears()
    {
        $years = DB::select("SELECT DISTINCT YEAR(tanggal_visit) AS year FROM visits");

        return $years;
    }

    public static function getMonth()
    {

        $months = DB::table('visits')
            ->select(DB::raw('DISTINCT MONTH(tanggal_visit) as month'))
            ->orderBy('month')
            ->get()
            ->pluck('month');

        $monthNames = $months->map(function ($month) {
            return Carbon::createFromDate(null, $month, null)
                ->locale('id_ID')
                ->monthName;
        });

        $monthsData = $months->combine($monthNames->toArray());

        return $monthsData;
    }

    public function exportVisit(Request $request)
    {
        // dd(Carbon::parse($request->start_date), $request->end_date);

        $visits = Visit::whereBetween('tanggal_visit',[$request->start_date, $request->end_date])->get();

        $visits = new VisitExport($visits);

        $filename = 'DataVisit–'.Carbon::now()->format('YmdHi').'.xlsx';

        return Excel::download($visits, $filename);
    }

    public static function convertToBr($visits)
    {
        foreach ($visits as $visit) {
            $visit->keluhan_utama = str_replace("\n", "<br />", $visit->keluhan_utama);
            $visit->riwayat_penyakit_dulu = str_replace("\n", "<br />", $visit->riwayat_penyakit_dulu);
            $visit->riwayat_penyakit_sekarang = str_replace("\n", "<br />", $visit->riwayat_penyakit_sekarang);
            $visit->riwayat_penyakit_keluarga = str_replace("\n", "<br />", $visit->riwayat_penyakit_keluarga);
            $visit->sg_kepala_leher = str_replace("\n", "<br />", $visit->sg_kepala_leher);
            $visit->sg_thorax = str_replace("\n", "<br />", $visit->sg_thorax);
            $visit->sg_cor = str_replace("\n", "<br />", $visit->sg_cor);
            $visit->sg_pulmo = str_replace("\n", "<br />", $visit->sg_pulmo);
            $visit->sg_abdomen = str_replace("\n", "<br />", $visit->sg_abdomen);
            $visit->sg_ekstremitas = str_replace("\n", "<br />", $visit->sg_ekstremitas);
            $visit->status_lokalis = str_replace("\n", "<br />", $visit->status_lokalis);
            $visit->hasil_lab = str_replace("\n", "<br />", $visit->hasil_lab);
            $visit->diagnosa = str_replace("\n", "<br />", $visit->diagnosa);
            $visit->planning = str_replace("\n", "<br />", $visit->planning);
        }

        return $visits;
    }

    static function updateDataNyangkut(): void
    {
        $today = Carbon::now()->toDateString();

        // dd($today != Visit::where('id',19)->value('tanggal_visit'));

        Visit::where('tanggal_visit', '<>', $today)
            ->whereNotIn('status', [4,5,6])
            ->update(['status' => 6]);

        Visit::where('tanggal_visit', '<>', $today)
            ->where('status', 4)
            ->update(['status' => 5]);

        InfoPostren::where('id', 1)
            ->update(['last_visit_update' => Carbon::now()]);
    }
}
