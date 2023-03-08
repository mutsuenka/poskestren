<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PasienImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pasien([
            'no_rekam_medis' => $row['Nomor_RM'],
            'nama_lengkap' => $row['Nama'],
            'nama_wali' => $row['Nama_KK'],
            'dob' => Carbon::parse($row['Tgl_Lahir']),
            'phone' => $row['No._HP'],
            'jenis_kelamin' => $row['Jenis_Kelamin'],
            'alamat' => $row['Alamat'],
            'agama' => $row['Agama'],
            'pendidikan' => $row['Pendidikan'],
            'pekerjaan' => $row['Pekerjaan'],
            'status_kawin' => $row['Status_Pernikahan'],
            'alergi' => $row['Alergi'],
            'kategori' => $row['Kategori']
        ]);
    }
}
