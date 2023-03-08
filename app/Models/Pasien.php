<?php

namespace App\Models;

use App\Models\Visit;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'nama_lengkap',
        'dob',
        'jenis_kelamin',
        'nik',
        'phone',
        'alamat',
        'alergi',
        'kategori',
        'no_rekam_medis',
        'nama_wali',
        'status_kawin',
        'agama'
    ];

    public function visit()
    {
        return $this->hasMany(Visit::class);
    }

    public function toSearchableArray()
    {
        return [
            'nama_lengkap' => $this->nama_lengkap,
            'kategori' => $this->kategori,
            'no_rekam_medis' => $this->no_rekam_medis,
            'phone' => $this->phone,
            'nik' => $this->nik
        ];
    }

}
