<?php

namespace App\Models;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Visit extends Model
{
    use HasFactory, Notifiable, Searchable;

    protected $fillable = [
        // antrian
        'pasien_id',
        'tanggal_visit',
        'no_antrian',
        'status',
        // vital
        'vital_tekanan_darah',
        'vital_nadi',
        'vital_suhu',
        'vital_respiratory_rate',
        'vital_spo',
        'vital_vas',
        'vital_gcs',
        'vital_berat_badan',
        'vital_tinggi_badan',
        // visit
        'keluhan_utama',
        'riwayat_penyakit_dulu',
        'riwayat_penyakit_sekarang',
        'riwayat_penyakit_keluarga',
        'sg_kepala_leher',
        'sg_thorax',
        'sg_cor',
        'sg_pulmo',
        'sg_ekstremitas',
        'status_lokalis',
        'diagnosa',
        'planning',
        'catatan'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     $array['nama_lengkap'] = $this->pasien['nama_lengkap'];
    //     $arary['no_rekam_medis'] = $this->pasien['no_rekam_medis'];

    //     return $array;
    // }
}
