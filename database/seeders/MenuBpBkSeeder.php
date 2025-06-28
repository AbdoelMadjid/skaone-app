<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuBpBkSeeder extends Seeder
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

        $mm = Menu::firstOrCreate(['url' => 'bpbk'], ['name' => 'Bimbingan Konseling', 'category' => 'MANAJEMEN SEKOLAH', 'icon' => 'user-settings']);
        $this->attachMenupermission($mm, ['read'], ['bpbk']);

        $sm = $mm->subMenus()->create(['name' => 'Konseling', 'url' => $mm->url . '/konseling', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['bpbk']);

        $sm = $mm->subMenus()->create(['name' => 'Data KIP', 'url' => $mm->url . '/data-kip', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['bpbk']);

        $sm = $mm->subMenus()->create(['name' => 'Home Visit', 'url' => $mm->url . '/home-visit', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['bpbk']);

        $sm = $mm->subMenus()->create(['name' => 'Melanjutkan Kuliah', 'url' => $mm->url . '/melanjutkan-kuliah', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['bpbk']);

        $sm = $mm->subMenus()->create(['name' => 'Penelusuran Lulusan', 'url' => $mm->url . '/penelusuran-lulusan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['bpbk']);

        $sm = $mm->subMenus()->create(['name' => 'Anggaran BP BK', 'url' => $mm->url . '/anggaran-bpbk', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['bpbk']);
    }
}
