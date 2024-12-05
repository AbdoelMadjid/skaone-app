<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'master']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'kepsek']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'tatausaha']);
        Role::create(['name' => 'wakasek']);
        Role::create(['name' => 'kaprog']);
        Role::create(['name' => 'gmapel']);
        Role::create(['name' => 'walas']);
        Role::create(['name' => 'siswa']);
        Role::create(['name' => 'tamu']);
    }
}
