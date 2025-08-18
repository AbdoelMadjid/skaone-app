<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainMenuAppRaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            MenuManajemenSekolahSeeder::class,
            MenuKurikulumSeeder::class,
            MenuGuruMapelSeeder::class,
            MenuWalasSeeder::class,
            MenuGuruWaliSeeder::class,
        ]);
    }
}
