<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            MenuProfilSeeder::class,
            MainMenuAppSupportSeeder::class,
            MainMenuAppRaporSeeder::class,
            MainMenuManajemenSekolahSeeder::class,
            MainMenuPesertaDidikSeeder::class,
            MainMenuPrakerinSeeder::class,
            MainMenuPklSeeder::class,
        ]);
    }
}
