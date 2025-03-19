<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddDefaultPasswordToDataPendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update semua data yang sudah ada dengan password default '1234'
        DB::table('data_penduduk')->update([
            'password' => Hash::make('1234'), // Hash password default
        ]);
    }
}