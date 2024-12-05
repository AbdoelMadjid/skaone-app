<?php

namespace Database\Factories\ManajemenSekolah;

use App\Models\ManajemenSekolah\RombonganBelajar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ManajemenSekolah\RombonganBelajar>
 */
class RombonganBelajarFactory extends Factory
{
    protected $model = RombonganBelajar::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tahunAjaranOptions = ['2024-2025'];
        $idKkOptions = [
            '411' => 'RPL',
            '421' => 'TKJ',
            '811' => 'BD',
            '821' => 'MP',
            '833' => 'AK',
        ];
        $tahunajaran = $this->faker->randomElement($tahunAjaranOptions);
        $id_kk = $this->faker->randomKey($idKkOptions);
        $singkatan_kk = $idKkOptions[$id_kk];
        $tingkat = $this->faker->randomElement(['10', '11', '12']);
        $pararel = $this->faker->randomElement(['1', '2', '3', '4', '5', '6']);
        $rombel = "{$tingkat} {$singkatan_kk} {$pararel}";
        $kode_rombel = substr($tahunajaran, 0, 4) . "{$id_kk}{$tingkat}-{$tingkat}{$singkatan_kk}{$pararel}";

        return [
            'tahunajaran' => $tahunajaran,
            'id_kk' => $id_kk,
            'tingkat' => $tingkat,
            'singkatan_kk' => $singkatan_kk,
            'pararel' => $pararel,
            'rombel' => $rombel,
            'kode_rombel' => $kode_rombel,
        ];
    }
}
