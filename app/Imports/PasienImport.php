<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class PasienImport implements ToModel,WithHeadingRow
{

    public function model(array $row)
    {
        return new Pasien([
            'no_rekam_medis' => $row['nomor_rm'],
            'nama_lengkap' => $row['nama'],
            'nama_wali' => $row['nama_kk'],
            'dob' => $row['tgl_lahir'],
            'phone' => $row['no_hp'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'agama' => $row['agama'],
            'pendidikan' => $row['pendidikan'],
            'pekerjaan' => $row['pekerjaan'],
            'status_kawin' => $row['sudah_menikah'],
            'alergi' => $row['alergi'],
            'kategori' => $row['kategori']
        ]);
    }
}
