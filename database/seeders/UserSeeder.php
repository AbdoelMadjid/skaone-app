<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar user dan role mereka
        $users = ['master', 'admin', 'kepsek', 'guru', 'tatausaha', 'wakasek', 'kaprog', 'gmapel', 'walas', 'siswa', 'tamu'];
        $names = ['Abdul Madjid', 'Ramdani Trias Sumiarsa', 'Damudin', 'Ebah Habibah', 'Tatik Nurhayati', 'Zulkifli Saban', 'Otong Sunahdi', 'Tabiin', 'Dede Nita', 'Azzam Ikbara Al-Madjid', 'Pengunjung'];

        // Default attributes
        $default = [
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'avatar' => '',
        ];

        // Roles yang memerlukan role tambahan 'guru'
        $roles_with_guru = ['master', 'admin', 'kepsek', 'wakasek', 'kaprog', 'walas', 'gmapel'];

        foreach ($users as $index => $value) {
            $name = $names[$index];
            $email = strtolower(str_replace(' ', '_', $name)) . '@gmail.com';

            // Membuat user
            $user = User::create([...$default, ...[
                'name' => $name,
                'email' => $email,
            ]]);

            // Cek apakah role perlu tambahan 'guru'
            if (in_array($value, $roles_with_guru)) {
                // Assign multiple roles: role utama dan guru
                $user->assignRole($value, 'guru'); // assign multiple roles
            } else {
                // Assign role tunggal untuk siswa, tatausaha, dan tamu
                $user->assignRole($value);
            }
        }
    }
}
