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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RoleSeeder::class,
            //UserSeeder::class,
            AppFiturSeeder::class,
            AppProfileSeeder::class,

            MainMenuSeeder::class,

            ReferensiSeeder::class,
            TahunAjaranSeeder::class,
            SemesterSeeder::class,
            IdentitasSekolahSeeder::class,

            BidangKeahlianSeeder::class,
            ProgramKeahlianSeeder::class,
            KompetensiKeahlianSeeder::class,

            KepalaSekolahSeeder::class,
            //PersonilSekolahSeeder::class,
            //RombonganBelajarSeeder::class,
            //PesertaDidikSeeder::class,

            KumpulanFaqSeeder::class,
            TeamPengembangSeeder::class,

            MataPelajaranSeeder::class,
            MataPelajaranPerJurusanSeeder::class,
        ]);
    }
}
