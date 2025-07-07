<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuAppSupportSeeder extends Seeder
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

        //tools
        $mm = Menu::firstOrCreate(['url' => 'appsupport'], ['name' => 'App Support', 'category' => 'KONFIGURASI', 'icon' => 'tools']);
        $this->attachMenupermission($mm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Menu', 'url' => $mm->url . '/menu', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete', 'sort'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'App Profil', 'url' => $mm->url . '/app-profil', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'App Fitur', 'url' => $mm->url . '/app-fiturs', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Impor Data Master', 'url' => $mm->url . '/impor-data-master', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Ekspor Data Master', 'url' => $mm->url . '/ekspor-data-master', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Backup DB', 'url' => $mm->url . '/backup-db', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Data Login', 'url' => $mm->url . '/data-login', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Referensi', 'url' => $mm->url . '/referensi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);
    }
}
