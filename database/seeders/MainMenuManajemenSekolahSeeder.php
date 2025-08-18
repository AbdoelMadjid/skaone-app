<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainMenuManajemenSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            MenuWakasekSeeder::class,
            MenuKaprodiSeeder::class,
            MenuTataUsahaSeeder::class,
            MenuBpBkSeeder::class,
        ]);
    }
}
