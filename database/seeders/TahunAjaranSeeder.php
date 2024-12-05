<?php

namespace Database\Seeders;

use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tahun_ajarans')->insert([
            ['tahunajaran' => '2013-2014', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2014-2015', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2015-2016', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2016-2017', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2017-2018', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2018-2019', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2019-2020', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2020-2021', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2021-2022', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2022-2023', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2023-2024', 'status' => 'Aktif'],
            ['tahunajaran' => '2024-2025', 'status' => 'Non Aktif'],
            ['tahunajaran' => '2025-2026', 'status' => 'Non Aktif'],
        ]);
    }
}
