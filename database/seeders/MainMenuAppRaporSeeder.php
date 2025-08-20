<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AppSupport\Menu;
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
