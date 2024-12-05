<?php

namespace Database\Seeders;

use App\Models\About\FiturCoding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiturCodingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika diperlukan
        DB::table('fitur_codings')->truncate();

        FiturCoding::factory()->count(14)->create();
    }
}
