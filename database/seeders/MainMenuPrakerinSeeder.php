<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainMenuPrakerinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            MenuPrakerinPanitiaSeeder::class,
            MenuPrakerinKaprodiSeeder::class,
            MenuPrakerinPembimbingSeeder::class,
            MenuPrakerinPesertaSeeder::class,
        ]);
    }
}
