<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainMenuAppSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            MenuPenggunaSeeder::class,
            MenuAppSupportSeeder::class,
            MenuWebSiteSeeder::class,
        ]);
    }
}
