<?php

namespace Database\Seeders;

use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua data dari tabel tahun_ajarans
        $tahunAjarans = TahunAjaran::all();

        foreach ($tahunAjarans as $tahunAjaran) {
            // Tambahkan semester Ganjil
            Semester::create([
                'tahun_ajaran_id' => $tahunAjaran->id,
                'semester' => 'Ganjil',
                'status' => 'Non Aktif', // Set default status atau sesuaikan dengan kebutuhan
            ]);

            // Tambahkan semester Genap
            Semester::create([
                'tahun_ajaran_id' => $tahunAjaran->id,
                'semester' => 'Genap',
                'status' => 'Non Aktif', // Set default status atau sesuaikan dengan kebutuhan
            ]);
        }
    }
}
