<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

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
        'Agama'
    ];

    public function visit()
    {
        $this->hasMany(Visit::class);
    }
}
