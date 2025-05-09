<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuSiswaSeeder extends Seeder
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

        $mm = Menu::firstOrCreate(['url' => 'ujiansemester'], ['name' => 'Ujian Semester', 'category' => 'KBM PESERTA DIDIK', 'icon' => 'edit-2']);
        $this->attachMenupermission($mm, ['read'], ['siswa']);

        $sm = $mm->subMenus()->create(['name' => 'Formatif', 'url' => $mm->url . '/test-formatif', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['siswa']);

        $sm = $mm->subMenus()->create(['name' => 'Sumatif', 'url' => $mm->url . '/test-sumatif', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['siswa']);

        $mm = Menu::firstOrCreate(['url' => 'kbmpesertadidik'], ['name' => 'KBM Peserta Didik', 'category' => 'KBM PESERTA DIDIK', 'icon' => 'contacts']);
        $this->attachMenupermission($mm, ['read'], ['siswa']);

        $sm = $mm->subMenus()->create(['name' => 'Raport', 'url' => $mm->url . '/raport-peserta-didik', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['siswa']);

        $sm = $mm->subMenus()->create(['name' => 'Transkrip Nilai', 'url' => $mm->url . '/transkrip-peserta-didik', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['siswa']);

        $sm = $mm->subMenus()->create(['name' => 'Remedial', 'url' => $mm->url . '/remedial-peserta-didik', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['siswa']);

        $sm = $mm->subMenus()->create(['name' => 'Kelulusan', 'url' => $mm->url . '/kelulusan-peserta-didik', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['siswa']);
    }
}
