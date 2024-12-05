<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KepalaSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kepala_sekolahs')->insert([
            ['nama' => 'Nana Surjana, S.Pd.', 'nip' => '19640513 198803 1 009', 'tahunajaran' => '2014-2015', 'semester' => 'Ganjil'],
            ['nama' => 'Drs. H. Wahyuddin, M.MPd.', 'nip' => '19570912 198203 1 013', 'tahunajaran' => '2014-2015', 'semester' => 'Genap'],
            ['nama' => 'Drs. H. Wahyuddin, M.MPd.', 'nip' => '19570912 198203 1 013', 'tahunajaran' => '2015-2016', 'semester' => 'Ganjil'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2015-2016', 'semester' => 'Genap'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2016-2017', 'semester' => 'Ganjil'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2016-2017', 'semester' => 'Genap'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2017-2018', 'semester' => 'Ganjil'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2017-2018', 'semester' => 'Genap'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2018-2019', 'semester' => 'Ganjil'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2018-2019', 'semester' => 'Genap'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2019-2020', 'semester' => 'Ganjil'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2019-2020', 'semester' => 'Genap'],
            ['nama' => 'H. M. Rochendi, S.Pd., M.Pd.I', 'nip' => '19610706 198803 1 008', 'tahunajaran' => '2020-2021', 'semester' => 'Ganjil'],
            ['nama' => 'Nana Surjana, S.Pd.', 'nip' => '19640513 198803 1 009', 'tahunajaran' => '2020-2021', 'semester' => 'Genap'],
            ['nama' => 'Nana Surjana, S.Pd.', 'nip' => '19640513 198803 1 009', 'tahunajaran' => '2021-2022', 'semester' => 'Ganjil'],
            ['nama' => 'Nana Surjana, S.Pd.', 'nip' => '19640513 198803 1 009', 'tahunajaran' => '2021-2022', 'semester' => 'Genap'],
            ['nama' => 'NANA SURJANA, S.Pd.', 'nip' => '19640513 198803 1 009', 'tahunajaran' => '2022-2023', 'semester' => 'Ganjil'],
            ['nama' => 'H. DAMUDIN, S.Pd., M.Pd.', 'nip' => '19740302 199803 1 002', 'tahunajaran' => '2022-2023', 'semester' => 'Genap'],
            ['nama' => 'H. DAMUDIN, S.Pd., M.Pd.', 'nip' => '19740302 199803 1 002', 'tahunajaran' => '2023-2024', 'semester' => 'Ganjil'],
            ['nama' => 'H. DAMUDIN, S.Pd., M.Pd.', 'nip' => '19740302 199803 1 002', 'tahunajaran' => '2023-2024', 'semester' => 'Genap'],
        ]);
    }
}
