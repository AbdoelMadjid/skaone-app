<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class MainMenuSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            MenuProfilSeeder::class,
            MenuPenggunaSeeder::class,
            MenuAppSupportSeeder::class,
            MenuManajemenSekolahSeeder::class,
            MenuKurikulumSeeder::class,
            MenuGuruMapelSeeder::class,
            MenuWalasSeeder::class,
            MenuWakasekSeeder::class,
            MenuKaprodiSeeder::class,
            MenuBpBkSeeder::class,
            MenuTataUsahaSeeder::class,
            MenuSiswaSeeder::class,
            MenuPklSeeder::class,
        ]);
    }
}
