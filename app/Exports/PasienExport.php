<?php

namespace App\Exports;

use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PasienExport implements FromCollection, WithHeadings, WithMapping
{

    protected $pasiens;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pasiens = Pasien::all();

        foreach ($pasiens as $pasien) {
            $pasien->jenis_kelamin == 1 ? $pasien->jenis_kelamin = 'Laki-laki' : $pasien->jenis_kelamin = 'Perempuan';

            $pasien->status_kawin == 1 ? $pasien->status_kawin = 'Sudah' : $pasien->status_kawin = 'belum';
        }

        return $pasiens;
    }

    public function headings(): array
    {
        return [
            '#',
            'Kategori',
            'Nomor Rekam Medis',
            'Nama Lengkap',
            'Nama Wali',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'NIK',
            'Nomor Telepon',
            'Menikah?',
            'Agama',
            'Pendidikan',
            'Pekerjaan',
            'Alamat',
            'Alergi'
        ];
    }

    public function map($pasiens): array
    {
        return [
            $pasiens->id,
            $pasiens->kategori,
            $pasiens->no_rekam_medis,
            $pasiens->nama_lengkap,
            $pasiens->nama_wali,
            $pasiens->dob,
            $pasiens->jenis_kelamin,
            $pasiens->nik,
            $pasiens->phone,
            $pasiens->status_kawin,
            $pasiens->agama,
            $pasiens->pendidikan,
            $pasiens->pekerjaan,
            $pasiens->alamat,
            $pasiens->alergi
        ];
    }
}
