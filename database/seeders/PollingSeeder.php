<?php

namespace Database\Seeders;

use App\Models\About\Polling;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PollingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polling = Polling::create([
            'title' => 'Evaluasi Aplikasi LCKS',
            'start_time' => now(),
            'end_time' => now()->addDays(7),
        ]);

        $polling->questions()->createMany([
            [
                'question_text' => 'Seberapa menarik anda menggunakan LCKS?',
                'question_type' => 'multiple_choice',
                'choice_descriptions' => [
                    1 => 'Sangat Tidak Menarik',
                    2 => 'Tidak Menarik',
                    3 => 'Cukup',
                    4 => 'Menarik',
                    5 => 'Sangat Menarik',
                ]
            ],
            [
                'question_text' => 'Seberapa sering anda menggunakan LCKS?',
                'question_type' => 'multiple_choice',
                'choice_descriptions' => [
                    1 => 'Sangat Tidak Sering',
                    2 => 'Tidak Sering',
                    3 => 'Cukup Sering',
                    4 => 'Sering',
                    5 => 'Sangat Sering',
                ]
            ],
            [
                'question_text' => 'Seberapa besar keinginan anda untuk mengetahui bagaimana pembuatan LCKS?',
                'question_type' => 'multiple_choice',
                'choice_descriptions' => [
                    1 => 'Sangat Tidak Tertarik',
                    2 => 'Tidak Tertarik',
                    3 => 'Cukup Tertarik',
                    4 => 'Tertarik',
                    5 => 'Sangat Tertarik',
                ]
            ],
            [
                'question_text' => 'Apakah fitur-fitur yang ada di LCKS sudah memenuhi kebutuhan anda?',
                'question_type' => 'multiple_choice',
                'choice_descriptions' => [
                    1 => 'Sangat Tidak Memenuhi',
                    2 => 'Tidak Memenuhi',
                    3 => 'Cukup Memenuhi',
                    4 => 'Memenuhi',
                    5 => 'Sangat Memenuhi',
                ]
            ],
            [
                'question_text' => 'Bagaimana anda memahami aplikasi LCKS?',
                'question_type' => 'multiple_choice',
                'choice_descriptions' => [
                    1 => 'Sangat Tidak Memahami',
                    2 => 'Tidak Memahami',
                    3 => 'Cukup Memahami',
                    4 => 'Memahami',
                    5 => 'Sangat Memahami',
                ]
            ],
            [
                'question_text' => 'Apakah LCKS mempermudah pekerjaan anda?',
                'question_type' => 'multiple_choice',
                'choice_descriptions' => [
                    1 => 'Sangat Tidak Mempermudah',
                    2 => 'Tidak Mempermudah',
                    3 => 'Cukup Mempermudah',
                    4 => 'Mempermudah',
                    5 => 'Sangat Mempermudah',
                ]
            ],
            [
                'question_text' => 'Bagaimana perasaan anda melihat aplikasi LCKS?',
                'question_type' => 'multiple_choice',
                'choice_descriptions' => [
                    1 => 'Sangat Tidak Memuaskan',
                    2 => 'Tidak Memuaskan',
                    3 => 'Cukup Memuaskan',
                    4 => 'Memuaskan',
                    5 => 'Sangat Memuaskan',
                ]
            ],
            [
                'question_text' => 'Silakan berikan saran untuk perbaikan aplikasi LCKS.',
                'question_type' => 'text'
            ],
            [
                'question_text' => 'Silakan berikan kesan terhadap aplikasi LCKS.',
                'question_type' => 'text'
            ],
            [
                'question_text' => 'Apa yang anda kagumi dari aplikasi ini, terutama fiturnya.',
                'question_type' => 'text'
            ],
            [
                'question_text' => 'Bagaimana kesan anda terhadap pembuat aplikasi LCKS.',
                'question_type' => 'text'
            ],
        ]);
    }
}
