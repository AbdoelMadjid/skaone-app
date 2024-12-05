<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bidang_keahlians')->insert([
            ['idbk' => '01', 'nama_bk' => 'Teknologi dan Rekayasa'],
            ['idbk' => '02', 'nama_bk' => 'Teknologi Informasi dan Komunikasi'],
            ['idbk' => '03', 'nama_bk' => 'Kesehatan'],
            ['idbk' => '04', 'nama_bk' => 'Agrobisnis dan Agroteknologi'],
            ['idbk' => '05', 'nama_bk' => 'Perikanan dan Kelautan'],
            ['idbk' => '06', 'nama_bk' => 'Bisnis dan Manajemen'],
            ['idbk' => '07', 'nama_bk' => 'Pariwisata'],
            ['idbk' => '08', 'nama_bk' => 'Seni Rupa dan Kriya'],
            ['idbk' => '09', 'nama_bk' => 'Seni Pertunjukan'],
            ['idbk' => '10', 'nama_bk' => 'Teknologi Informasi'],
            ['idbk' => '11', 'nama_bk' => 'Bisnis dan Manajemen'],
        ]);
    }
}
