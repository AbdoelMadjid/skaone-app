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

        $mm = Menu::firstOrCreate(['url' => 'alumni'], ['name' => 'Alumni', 'category' => 'PESERTA DIDIK', 'icon' => 'group']);
        $this->attachMenupermission($mm, ['read'], ['alumni']);

        $sm = $mm->subMenus()->create(['name' => 'Riwayat Kerja', 'url' => $mm->url . '/riwayat-kerja', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['alumni']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi Alumni', 'url' => $mm->url . '/informasi-alumni', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['alumni']);

        $sm = $mm->subMenus()->create(['name' => 'Arsip Transkrip', 'url' => $mm->url . '/arsip-transkrip', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['alumni']);

        $sm = $mm->subMenus()->create(['name' => 'Arsip Kelulusan', 'url' => $mm->url . '/arsip-kelulusan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['alumni']);
    }
}
