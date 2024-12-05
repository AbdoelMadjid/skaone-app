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

        $mm = Menu::firstOrCreate(['url' => 'ketatausahaan/persuratan'], ['name' => 'Persuratan', 'category' => 'KETATAUSAHAAN', 'icon' => 'mail-settings']);
        $this->attachMenupermission($mm, null, ['tatausaha']);

        $mm = Menu::firstOrCreate(['url' => 'ketatausahaan/sarana-prasarana'], ['name' => 'Sarana Prasarana', 'category' => 'KETATAUSAHAAN', 'icon' => 'community']);
        $this->attachMenupermission($mm, null, ['tatausaha']);

        $mm = Menu::firstOrCreate(['url' => 'ketatausahaan/manajemen-barang'], ['name' => 'Manajemen Barang', 'category' => 'KETATAUSAHAAN', 'icon' => 'briefcase']);
        $this->attachMenupermission($mm, null, ['tatausaha']);

        $mm = Menu::firstOrCreate(['url' => 'ketatausahaan/agenda-ketatausahaan'], ['name' => 'Agenda', 'category' => 'KETATAUSAHAAN', 'icon' => 'calendar']);
        $this->attachMenupermission($mm, null, ['tatausaha']);

        $mm = Menu::firstOrCreate(['url' => 'ketatausahaan/anggaran-ketatausahaan'], ['name' => 'Anggaran', 'category' => 'KETATAUSAHAAN', 'icon' => 'shopping-cart-2']);
        $this->attachMenupermission($mm, null, ['tatausaha']);
    }
}
