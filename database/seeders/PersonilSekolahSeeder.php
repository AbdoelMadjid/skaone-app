<?php

namespace Database\Seeders;

use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonilSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika diperlukan
        //DB::table('personil_sekolahs')->truncate();

        // Buat satu entri pertama sebagai Kepala Sekolah dengan status Aktif
        PersonilSekolah::factory()->kepalaSekolah()->create();

        // Buat 90 entri Guru (90%)
        for ($i = 0; $i < 100; $i++) {
            PersonilSekolah::factory()->guruAtauTataUsaha()->create(['aktif' => 'Aktif', 'jenispersonil' => 'Guru']);
        }

        // Buat 9 entri Tata Usaha (10%)
        for ($i = 0; $i < 25; $i++) {
            PersonilSekolah::factory()->guruAtauTataUsaha()->create(['aktif' => 'Aktif', 'jenispersonil' => 'Tata Usaha']);
        }

        // Buat 2 - 3 entri Tidak Aktif, Pindah, Pensiun
        $statuses = ['Tidak Aktif', 'Pindah', 'Pensiun', 'Keluar'];
        foreach ($statuses as $status) {
            $numberOfEntries = rand(5, 10);
            for ($i = 0; $i < $numberOfEntries; $i++) {
                PersonilSekolah::factory()->guruAtauTataUsaha()->create(['aktif' => $status]);
            }
        }
    }
}
