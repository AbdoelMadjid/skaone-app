<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuGuruWaliSeeder extends Seeder
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

        // kurikulum
        $mm = Menu::firstOrCreate(['url' => 'guruwali'], ['name' => 'Guru Wali', 'category' => 'APLIKASI RAPORT', 'icon' => 'account-pin-box']);
        $this->attachMenupermission($mm, ['read'], ['admin', 'guruwali']);


        $sm = $mm->subMenus()->create(['name' => 'Data Siswa', 'url' => $mm->url . '/data-siswa', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin', 'guruwali']);

        $sm = $mm->subMenus()->create(['name' => 'Laporan Perkembangan', 'url' => $mm->url . '/laporan-perkembangan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin', 'guruwali']);
    }
}
