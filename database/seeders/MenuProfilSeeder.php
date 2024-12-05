<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuProfilSeeder extends Seeder
{
    use HasMenuPermission;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cache::forget('menus');
        /**
         * @var Menu $mm
         */

        $mm = Menu::firstOrCreate(['url' => 'profilpengguna'], ['name' => 'Identitas Pengguna', 'category' => 'IDENTITAS PENGGUNA', 'icon' => 'file-user']);
        $this->attachMenupermission($mm, ['read'], ['kepsek', 'guru', 'tatausaha', 'siswa']);

        $sm = $mm->subMenus()->create(['name' => 'Profil', 'url' => $mm->url . '/profil-pengguna', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read', 'update'], ['kepsek', 'guru', 'tatausaha', 'siswa']);

        $sm = $mm->subMenus()->create(['name' => 'Password', 'url' => $mm->url . '/password-pengguna', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read', 'update'], ['kepsek', 'guru', 'tatausaha', 'siswa']);

        $sm = $mm->subMenus()->create(['name' => 'Pesan', 'url' => $mm->url . '/pesan-pengguna', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kepsek', 'guru', 'tatausaha', 'siswa']);
    }
}
