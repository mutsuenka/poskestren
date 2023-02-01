<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasiens')->insert([
            'nama_lengkap' => 'Muhammad',
            'dob' => '1992-09-15',
            'jenis_kelamin' => 1,
            'nik' => '3311041509920001',
            'phone' => '82112517078',
            'alamat' => 'Jatirejo, Mulur, Bendosari, Sukoharjo, Jawa Tengah',
            'alergi' => 'dingin, ikan',
            'kategori' => 'Umum',
            'no_rekam_medis' => 'U-1120',
            'nama_wali' => 'Sendiri',
            'status_kawin' => true,
        ]);

        DB::table('pasiens')->insert([
            'nama_lengkap' => 'Ihdal Husnayain',
            'dob' => '1997-04-29',
            'jenis_kelamin' => 2,
            'nik' => '3311041509920002',
            'phone' => '81292230286',
            'alamat' => 'Jatirejo, Mulur, Bendosari, Sukoharjo, Jawa Tengah',
            'alergi' => 'dingin, minyak goreng',
            'kategori' => 'Umum',
            'no_rekam_medis' => 'U-1121',
            'nama_wali' => 'Muhammad',
            'status_kawin' => true,
        ]);
    }
}
