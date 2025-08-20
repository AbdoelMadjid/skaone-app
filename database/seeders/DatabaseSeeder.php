<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AppSupport\Menu;
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

        // Setelah semua seeder jalan → reset ulang orders
        $this->resetMenuOrders();
    }

    private function resetMenuOrders()
    {
        // ambil semua menu by created_at (urutan seed)
        $menus = Menu::orderBy('created_at')->get();

        $i = 1;
        foreach ($menus as $menu) {
            $menu->orders = $i++;
            $menu->saveQuietly(); // biar gak update timestamp
        }
    }
}
