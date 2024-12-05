<?php

namespace Database\Factories\About;

use App\Models\About\KumpulanFaq;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About\KumpulanFaq>
 */
class KumpulanFaqFactory extends Factory
{
    protected $model = KumpulanFaq::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategori' => $this->faker->randomElement(['Guru', 'Wali Kelas', 'Siswa']),
            'pertanyaan' => $this->faker->sentence,
            'jawaban' => $this->faker->paragraph,
        ];
    }
}
