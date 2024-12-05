<?php

namespace Database\Seeders;

use App\Models\About\KumpulanFaq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KumpulanFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 5 entri untuk masing-masing kategori
        KumpulanFaq::factory()->count(5)->create(['kategori' => 'Guru']);
        KumpulanFaq::factory()->count(5)->create(['kategori' => 'Wali Kelas']);
        KumpulanFaq::factory()->count(5)->create(['kategori' => 'Siswa']);
    }
}
