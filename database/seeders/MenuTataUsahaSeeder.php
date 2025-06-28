<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuTataUsahaSeeder extends Seeder
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

        $mm = Menu::firstOrCreate(['url' => 'ketatausahaan'], ['name' => 'Tata Usaha', 'category' => 'MANAJEMEN SEKOLAH', 'icon' => 'pages']);
        $this->attachMenupermission($mm, ['read'], ['tatausaha']);

        $sm = $mm->subMenus()->create(['name' => 'Persuratan', 'url' => $mm->url . '/persuratan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);

        $sm = $mm->subMenus()->create(['name' => 'Sarana Prasarana', 'url' => $mm->url . '/sarana-prasarana', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);

        $sm = $mm->subMenus()->create(['name' => 'Manajemen Barang', 'url' => $mm->url . '/manajemen-barang', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);

        $sm = $mm->subMenus()->create(['name' => 'Agenda Ketatausahaan', 'url' => $mm->url . '/agenda-ketatausahaan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);

        $sm = $mm->subMenus()->create(['name' => 'Anggaran Ketatausahaan', 'url' => $mm->url . '/anggaran-ketatausahaan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);
    }
}
