<?php

namespace Database\Seeders;

use App\Models\Kurikulum\PerangkatUjian\ExamSchedule;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExamScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mataPelajaran = [
            'Matematika',
            'Bahasa Indonesia',
            'IPA',
            'IPS',
            'Bahasa Inggris'
        ];

        $kelas = '9A';
        $tahunAjaran = '2024/2025';
        $namaUjian = 'Penilaian Sumatif Akhir Jenangan (PSAJ)';

        $startDate = Carbon::createFromFormat('Y-m-d', now()->format('Y-m-d'))->addDay(); // mulai besok

        $jamSesi1Mulai = '08:00';
        $jamSesi1Selesai = '10:00';

        $jamSesi2Mulai = '10:30';
        $jamSesi2Selesai = '12:30';

        foreach (array_chunk($mataPelajaran, 2) as $index => $pair) {
            $tanggal = $startDate->copy()->addDays($index);

            foreach ($pair as $i => $mapel) {
                $jamMulai = $i == 0 ? $jamSesi1Mulai : $jamSesi2Mulai;
                $jamSelesai = $i == 0 ? $jamSesi1Selesai : $jamSesi2Selesai;

                ExamSchedule::create([
                    'tahun_ajaran' => $tahunAjaran,
                    'nama_ujian' => $namaUjian,
                    'kelas' => $kelas,
                    'mata_pelajaran' => $mapel,
                    'tanggal_mulai' => $tanggal->toDateString(),
                    'tanggal_selesai' => $tanggal->toDateString(),
                    'jam_mulai' => $jamMulai,
                    'jam_selesai' => $jamSelesai,
                    'link_soal' => 'https://example.com/soal/' . Str::slug($mapel),
                ]);
            }
        }
    }
}
