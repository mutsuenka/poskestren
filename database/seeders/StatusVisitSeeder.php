<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Dalam Antrian', 'Selesai Pemeriksaan Vital', 'Pemeriksaan Dokter', 'Menunggu Obat', 'Selesai', 'No Show'];

        foreach ($statuses as $status) {
            DB::table('master_status_visits')->insert([
                'nama_status' => $status
            ]);
        }
    }
}
