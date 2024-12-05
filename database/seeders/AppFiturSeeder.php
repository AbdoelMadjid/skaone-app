<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppFiturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Data = [
            [
                'nama_fitur' => 'language',
                'aktif' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_fitur' => 'web-app',
                'aktif' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_fitur' => 'my-cart',
                'aktif' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_fitur' => 'fullscreen',
                'aktif' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_fitur' => 'light-dark-mode',
                'aktif' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_fitur' => 'notifications',
                'aktif' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the 'fitur' table
        DB::table('app_fiturs')->insert($Data);
    }
}
