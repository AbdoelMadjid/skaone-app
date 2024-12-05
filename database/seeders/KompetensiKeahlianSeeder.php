<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KompetensiKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kompetensi_keahlians')->insert([
            ["idkk" => "411", "id_bk" => "10", "id_pk" => "1001", "nama_kk" => "Rekayasa Perangkat Lunak", "singkatan" => "RPL"],
            ["idkk" => "421", "id_bk" => "10", "id_pk" => "1002", "nama_kk" => "Teknik Komputer dan Jaringan", "singkatan" => "TKJ"],
            ["idkk" => "811", "id_bk" => "11", "id_pk" => "1101", "nama_kk" => "Bisnis Digital", "singkatan" => "BD"],
            ["idkk" => "821", "id_bk" => "11", "id_pk" => "1102", "nama_kk" => "Manajemen Perkantoran", "singkatan" => "MP"],
            ["idkk" => "833", "id_bk" => "11", "id_pk" => "1103", "nama_kk" => "Akuntansi", "singkatan" => "AK"],
        ]);
    }
}
