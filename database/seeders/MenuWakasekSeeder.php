<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuWakasekSeeder extends Seeder
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

        $mm = Menu::firstOrCreate(['url' => 'wakilkepalasekolah/agenda-kegiatan-wakasek'], ['name' => 'Agenda Kegiatan', 'category' => 'WAKIL KEPALA SEKOLAH', 'icon' => 'calendar']);
        $this->attachMenupermission($mm, null, ['wakasek']);

        $mm = Menu::firstOrCreate(['url' => 'wakilkepalasekolah/anggaran-wakasek'], ['name' => 'Anggaran', 'category' => 'WAKIL KEPALA SEKOLAH', 'icon' => 'shopping-cart-2']);
        $this->attachMenupermission($mm, null, ['wakasek']);
    }
}
