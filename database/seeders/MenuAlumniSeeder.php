<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuAlumniSeeder extends Seeder
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

        $mm = Menu::firstOrCreate(['url' => 'ruangalumni'], ['name' => 'Ruang Alumni', 'category' => 'ALUMNI', 'icon' => 'home-smile']);
        $this->attachMenupermission($mm, ['read'], ['alumni']);

        $sm = $mm->subMenus()->create(['name' => 'Riwayat Kerja', 'url' => $mm->url . '/riwayat-kerja', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['alumni']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi Alumni', 'url' => $mm->url . '/informasi-alumni', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['alumni']);

        $mm = Menu::firstOrCreate(['url' => 'arsipalumni'], ['name' => 'Arsip Alumni', 'category' => 'ALUMNI', 'icon' => 'contacts']);
        $this->attachMenupermission($mm, ['read'], ['alumni']);

        $sm = $mm->subMenus()->create(['name' => 'Transkrip', 'url' => $mm->url . '/transkrip-alumni', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['alumni']);

        $sm = $mm->subMenus()->create(['name' => 'Kelulusan', 'url' => $mm->url . '/kelulusan-alumni', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['alumni']);
    }
}
