<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoPostrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_postrens')->insert([
            'nama_yayasan' => 'Yayasan Subulussalam',
            'nama_postren' => 'Poskestren & Praktek Dokter Gratis Baitussalam',
            'alamat' => 'Jl. Krajan Utara, RT.1 RW5, Wonolopo, Kec. Mijen, Kota Semarang, Jawa Tengah 50215',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
