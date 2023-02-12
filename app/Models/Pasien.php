<?php

namespace App\Models;

use App\Models\Visit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->hasMany(Visit::class);
    }

}
