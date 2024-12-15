<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Nonaktifkan foreign key checks
        DB::table('menus')->truncate();
        DB::table('menu_permission')->truncate();
        DB::table('permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Aktifkan kembali foreign key checks

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
