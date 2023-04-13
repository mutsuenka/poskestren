<?php

namespace App\Exports;

use App\Models\Visit;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VisitExport implements FromCollection, WithHeadings, WithMapping
{
    protected $visits;

    public function __construct(Collection $visits)
    {
        $this->visits = $visits;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->visits;
    }

    public function headings(): array
    {
        return [
            'Nomor Rekam Medis',
            'Nama Pasien',
            'Tanggal Visit',
            'Tekanan Darah',
            'Nadi',
            'Suhu',
            'RR',
            'SPO',
            'VAS',
            'GCS',
            'BB',
            'TB',
            'Keluhan Utama',
            'Riwayat Penyakit Dulu',
            'Riwayat Penyakit Sekarang',
            'Riwayat Penyakit Keluarga',
            'SG Kepala/Leher',
            'SG Thorax',
            'SG COR',
            'SG Pulmo',
            'SG Abdomen',
            'SG Ekstremitas',
            'Status Lokalis',
            'Hasil Lab',
            'Diagnosis',
            'Planning',
            'Dokter Pemeriksa'
        ];
    }

    public function map($visits):array
    {
        return [
            $visits->pasien->no_rekam_medis,
            $visits->pasien->nama_lengkap,
            $visits->tanggal_visit,
            $visits->vital_tekanan_darah,
            $visits->vital_nadi,
            $visits->vital_suhu,
            $visits->vital_respiratory_rate,
            $visits->vital_spo,
            $visits->vital_vas,
            $visits->vital_gcs,
            $visits->vital_berat_badan,
            $visits->vital_tinggi_badan,
            $visits->keluhan_utama,
            $visits->riwayat_penyakit_dulu,
            $visits->riwayat_penyakit_sekarang,
            $visits->riwayat_penyakit_keluarga,
            $visits->sg_kepala_leher,
            $visits->sg_thorax,
            $visits->sg_cor,
            $visits->sg_pulmo,
            $visits->sg_abdomen,
            $visits->sg_ekstremitas,
            $visits->status_lokalis,
            $visits->hasil_lab,
            $visits->diagnosa,
            $visits->planning,
            $visits->nama_dokter
        ];
    }
}
