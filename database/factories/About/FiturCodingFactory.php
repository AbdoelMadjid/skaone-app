<?php

namespace Database\Factories\About;

use App\Models\About\FiturCoding;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About\FiturCoding>
 */
class FiturCodingFactory extends Factory
{
    protected $model = FiturCoding::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Judul tetap dan deskripsi serta contoh acak
        static $titles = [
            'role permission spatie',
            'datatable yajra',
            'Multi language',
            'Factory for sample',
            'Menu by table',
            'image management',
            'request validation',
            'relation table',
            'form by multi action',
            'management feature',
            'value automatic',
            'input by null data',
            'search by condition',
            'Download Upload by Excel',
        ];

        return [
            'judul' => array_shift($titles), // Tetap menggunakan judul secara berurutan
            'deskripsi' => $this->faker->paragraph, // Deskripsi acak
            'contoh' => $this->faker->sentence,     // Contoh acak
        ];
    }
}
