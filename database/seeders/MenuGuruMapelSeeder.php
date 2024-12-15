<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuGuruMapelSeeder extends Seeder
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

        // guru mapel
        $mm = Menu::firstOrCreate(['url' => 'gurumapel'], ['name' => 'Guru Mata Pelajaran', 'category' => 'APLIKASI RAPORT', 'icon' => 'file-user']);
        $this->attachMenupermission($mm, ['read'], ['gmapel']);

        $sm = $mm->subMenus()->create(['name' => 'Administrasi Guru', 'url' => $mm->url . '/administrasi-guru', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['gmapel']);

        $sm = $mm->subMenus()->create(['name' => 'Data KBM', 'url' => $mm->url . '/datangajar', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['gmapel']);

        $csm = $sm->subMenus()->create(['name' => 'Data Ngajar', 'url' => $sm->url . '/data-kbm', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

        $csm = $sm->subMenus()->create(['name' => 'Capaian Pembelajaran', 'url' => $sm->url . '/capaian-pembelajaran', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

        $csm = $sm->subMenus()->create(['name' => 'Tujuan Pembelajaran', 'url' => $sm->url . '/tujuan-pembelajaran', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

        $sm = $mm->subMenus()->create(['name' => 'Penilaian', 'url' => $mm->url . '/penilaian', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['gmapel']);

        $csm = $sm->subMenus()->create(['name' => 'Formatif', 'url' => $sm->url . '/formatif', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

        $csm = $sm->subMenus()->create(['name' => 'Sumatif', 'url' => $sm->url . '/sumatif', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

        $csm = $sm->subMenus()->create(['name' => 'Deskripsi Nilai', 'url' => $sm->url . '/deskripsi-nilai', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

        $sm = $mm->subMenus()->create(['name' => 'Ujian Sumatif', 'url' => $mm->url . '/ujian-sumatif', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['gmapel']);

        $sm = $mm->subMenus()->create(['name' => 'Ajuan Remedial', 'url' => $mm->url . '/ajuan-remedial', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['gmapel']);

        $sm = $mm->subMenus()->create(['name' => 'Arsip KBM', 'url' => $mm->url . '/arsip-kbm', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['gmapel']);
    }
}
