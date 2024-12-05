<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuWalasSeeder extends Seeder
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

        // wali kelas
        $mm = Menu::firstOrCreate(['url' => 'walikelas'], ['name' => 'Wali Kelas', 'category' => 'APLIKASI RAPORT', 'icon' => 'shield-user']);
        $this->attachMenupermission($mm, ['read'], ['walas']);

        $sm = $mm->subMenus()->create(['name' => 'Data Kelas', 'url' => $mm->url . '/data-kelas', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

        $sm = $mm->subMenus()->create(['name' => 'Identitas Siswa', 'url' => $mm->url . '/identitas-siswa', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

        $sm = $mm->subMenus()->create(['name' => 'Absensi Siswa', 'url' => $mm->url . '/absensi-siswa', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

        $sm = $mm->subMenus()->create(['name' => 'Ekstrakulikuler', 'url' => $mm->url . '/ekstrakulikuler', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

        $sm = $mm->subMenus()->create(['name' => 'Prestasi Siswa', 'url' => $mm->url . '/prestasi-siswa', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

        $sm = $mm->subMenus()->create(['name' => 'Praktek Kerja', 'url' => $mm->url . '/praktek-kerja', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

        $sm = $mm->subMenus()->create(['name' => 'Catatan Wali Kelas', 'url' => $mm->url . '/catatan-wali-kelas', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);
    }
}
