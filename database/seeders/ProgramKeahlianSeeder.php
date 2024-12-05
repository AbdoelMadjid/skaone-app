<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('program_keahlians')->insert([
            ['idpk' => '1001', 'id_bk' => '10', 'nama_pk' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['idpk' => '1002', 'id_bk' => '10', 'nama_pk' => 'Teknik Jaringan Komputer dan Telekomunikasi'],
            ['idpk' => '1101', 'id_bk' => '11', 'nama_pk' => 'Pemasaran'],
            ['idpk' => '1102', 'id_bk' => '11', 'nama_pk' => 'Manajemen Perkantoran dan Layanan Bisnis'],
            ['idpk' => '1103', 'id_bk' => '11', 'nama_pk' => 'Akuntansi dan Keuangan Lembaga'],
        ]);
    }
}
