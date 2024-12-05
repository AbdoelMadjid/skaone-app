<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_profiles')->insert([
            [
                'app_nama' => 'LCKS App',
                'app_deskripsi' => 'Aplikasi Laporan Capaian Kompetensi Siswa',
                'app_tahun' => 2013,
                'app_pengembang' => 'Repalogic Inc.',
                'app_icon' => 'icon-blue.png',
                'app_logo' => 'logolcks.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
