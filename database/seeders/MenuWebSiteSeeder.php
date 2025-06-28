<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuWebSiteSeeder extends Seeder
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
        $mm = Menu::firstOrCreate(['url' => 'websiteapp'], ['name' => 'Web Site App', 'category' => 'KONFIGURASI', 'icon' => 'globe']);
        $this->attachMenupermission($mm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Team Pengembang', 'url' => $mm->url . '/team-pengembang', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Kumpulan Faqs', 'url' => $mm->url . '/kumpulan-faqs', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Fitur Coding', 'url' => $mm->url . '/fitur-coding', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Photo Slide', 'url' => $mm->url . '/photo-slides', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Galery', 'url' => $mm->url . '/galery', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Photo Jurusan', 'url' => $mm->url . '/photo-jurusan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Daily Messages', 'url' => $mm->url . '/daily-messages', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Events', 'url' => $mm->url . '/events', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Polling', 'url' => $mm->url . '/polling', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);
    }
}
