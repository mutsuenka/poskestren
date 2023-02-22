<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Dokter', 'Perawat', 'Super Admin'];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'nama_role' => $role
            ]);
        }
    }
}
