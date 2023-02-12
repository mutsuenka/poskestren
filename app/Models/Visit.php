<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'tanggal_visit',
        'no_antrian',
        'status',
        'vital_tekanan_darah',
        'vital_nadi',
        'vital_suhu',
        'vital_respiratory_rate',
        'vital_spo',
        'vital_vas',
        'vital_gcs',
        'vital_berat_badan',
        'vital_tinggi_badan',
        'keluhan_utama',
        'riwayat_penyakit_dulu',
        'riwayat_penyakit_sekarang',
        'riwayat_penyakit_keluarga',
        'sg_kepala_leher',
        'sg_thorax',
        'sg_cob',
        'sg_ekstremitas',
        'status_lokalis',
        'diagnosa',
        'planning'
    ];

    public function pasien()
    {
        $this->belongsTo(Pasien::class);
    }
}
