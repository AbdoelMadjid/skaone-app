<?php

namespace Database\Seeders;

use App\Models\ManajemenSekolah\PesertaDidik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesertaDidikSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jumlah siswa per kode_kk
        $jumlahSiswa = [
            '411' => 115,
            '421' => 225,
            '811' => 95,
            '821' => 352,
            '833' => 254,
        ];

        // Generate siswa per kompetensi keahlian
        foreach ($jumlahSiswa as $kode_kk => $jumlah) {
            PesertaDidik::factory()
                ->count($jumlah)
                ->state([
                    'kode_kk' => $kode_kk,
                ])
                ->create();
        }
    }
}
