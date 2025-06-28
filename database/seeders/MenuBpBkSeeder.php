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

        $mm = Menu::firstOrCreate(['url' => 'bpbk/konseling'], ['name' => 'Konseling', 'category' => 'BIMBINGAN KONSELING', 'icon' => 'chat-smile-3']);
        $this->attachMenupermission($mm, null, ['bpbk']);

        $mm = Menu::firstOrCreate(['url' => 'bpbk/data-kip'], ['name' => 'Data KIP', 'category' => 'BIMBINGAN KONSELING', 'icon' => 'clockwise']);
        $this->attachMenupermission($mm, null, ['bpbk']);

        $mm = Menu::firstOrCreate(['url' => 'bpbk/home-visit'], ['name' => 'Home Visit', 'category' => 'BIMBINGAN KONSELING', 'icon' => 'home-smile']);
        $this->attachMenupermission($mm, null, ['bpbk']);

        $mm = Menu::firstOrCreate(['url' => 'bpbk/melanjutkan-kuliah'], ['name' => 'Melanjutkan Kuliah', 'category' => 'BIMBINGAN KONSELING', 'icon' => 'folder-upload']);
        $this->attachMenupermission($mm, null, ['bpbk']);

        $mm = Menu::firstOrCreate(['url' => 'bpbk/penelusuran-lulusan'], ['name' => 'Penelusuran Lulusan', 'category' => 'BIMBINGAN KONSELING', 'icon' => 'map-pin-user']);
        $this->attachMenupermission($mm, null, ['bpbk']);

        $mm = Menu::firstOrCreate(['url' => 'bpbk/anggaran-bpbk'], ['name' => 'Anggaran BP', 'category' => 'BIMBINGAN KONSELING', 'icon' => 'shopping-cart-2']);
        $this->attachMenupermission($mm, null, ['bpbk']);
    }
}
