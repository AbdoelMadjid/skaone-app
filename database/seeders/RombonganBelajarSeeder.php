<?php

namespace Database\Seeders;

use App\Models\ManajemenSekolah\RombonganBelajar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ManajemenSekolah\PersonilSekolah; // Import model personil_sekolahs

class RombonganBelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Hapus data lama jika diperlukan
        DB::table('rombongan_belajars')->truncate();

        $data = [
            '411' => [
                'RPL' => [
                    '10' => ['1', '2', '3'],
                    '11' => ['1', '2'],
                    '12' => ['1', '2', '3', '4'],
                ],
            ],
            '421' => [
                'TKJ' => [
                    '10' => ['1', '2'],
                    '11' => ['1', '2', '3'],
                    '12' => ['1', '2', '3', '4'],
                ],
            ],
            '811' => [
                'BD' => [
                    '10' => ['1', '2'],
                    '11' => ['1', '2'],
                    '12' => ['1', '2'],
                ],
            ],
            '821' => [
                'MP' => [
                    '10' => ['1', '2', '3', '4', '5'],
                    '11' => ['1', '2', '3', '4', '5'],
                    '12' => ['1', '2', '3', '4', '5'],
                ],
            ],
            '833' => [
                'AK' => [
                    '10' => ['1', '2', '3', '4'],
                    '11' => ['1', '2', '3', '4', '5'],
                    '12' => ['1', '2', '3', '4', '5'],
                ],
            ],
        ];

        $tahunajaran = '2024-2025';

        // Ambil data wali kelas dari tabel personil_sekolahs hanya untuk jenispersonil "Guru"
        $wali_kelas_list = PersonilSekolah::where('jenispersonil', 'Guru')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        // Pastikan bahwa kita memiliki cukup wali kelas untuk rombel yang ada
        $total_rombel = array_sum(array_map('count', array_merge(...array_values($data))));
        if (count($wali_kelas_list) < $total_rombel) {
            throw new \Exception('Jumlah wali kelas tidak mencukupi untuk jumlah rombel yang ada.');
        }

        foreach ($data as $id_kk => $groups) {
            foreach ($groups as $singkatan_kk => $levels) {
                foreach ($levels as $tingkat => $pararels) {
                    foreach ($pararels as $pararel) {
                        $rombel = "{$tingkat} {$singkatan_kk} {$pararel}";
                        $kode_rombel = substr($tahunajaran, 0, 4) . "{$id_kk}{$tingkat}-" . $tingkat . $singkatan_kk . $pararel;

                        // Cek jika masih ada wali kelas yang tersedia
                        if (empty($wali_kelas_list)) {
                            throw new \Exception('Tidak ada lagi wali kelas yang tersedia.');
                        }

                        // Ambil wali kelas secara acak dari database
                        $wali_kelas_id = array_rand($wali_kelas_list); // Mendapatkan id_personil secara acak
                        $wali_kelas_nama = $wali_kelas_list[$wali_kelas_id];

                        // Hapus wali kelas yang sudah dipilih agar tidak terpakai lagi
                        unset($wali_kelas_list[$wali_kelas_id]);

                        RombonganBelajar::create([
                            'tahunajaran' => $tahunajaran,
                            'id_kk' => $id_kk,
                            'tingkat' => (string) $tingkat, // Convert to string
                            'singkatan_kk' => $singkatan_kk,
                            'pararel' => $pararel,
                            'rombel' => $rombel,
                            'kode_rombel' => $kode_rombel,
                            'wali_kelas' => $wali_kelas_id, // Simpan id_personil sebagai wali_kelas
                        ]);
                    }
                }
            }
        }
    }
}
