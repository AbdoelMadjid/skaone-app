<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuKaprodiSeeder extends Seeder
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

        $mm = Menu::firstOrCreate(['url' => 'kaprodi/uji-kompetensi-keahlian'], ['name' => 'Uji Kompetensi Keahlian', 'category' => 'KEPALA PROGRAM STUDI', 'icon' => 'checkbox-multiple']);
        $this->attachMenupermission($mm, null, ['kaprog']);

        $mm = Menu::firstOrCreate(['url' => 'kaprodi/agenda-kegiatan-kaprodi'], ['name' => 'Agenda Kaprodi', 'category' => 'KEPALA PROGRAM STUDI', 'icon' => 'calendar']);
        $this->attachMenupermission($mm, null, ['kaprog']);

        $mm = Menu::firstOrCreate(['url' => 'kaprodi/pembagian-jam-ngajar'], ['name' => 'Pembagian Jam Ngajar', 'category' => 'KEPALA PROGRAM STUDI', 'icon' => 'time']);
        $this->attachMenupermission($mm, null, ['kaprog']);

        $mm = Menu::firstOrCreate(['url' => 'kaprodi/laboratorium'], ['name' => 'Laboratorium', 'category' => 'KEPALA PROGRAM STUDI', 'icon' => 'computer']);
        $this->attachMenupermission($mm, null, ['kaprog']);

        $mm = Menu::firstOrCreate(['url' => 'kaprodi/anggaran-kaprodi'], ['name' => 'Anggaran Kaprodi', 'category' => 'KEPALA PROGRAM STUDI', 'icon' => 'shopping-cart-2']);
        $this->attachMenupermission($mm, null, ['kaprog']);
    }
}
