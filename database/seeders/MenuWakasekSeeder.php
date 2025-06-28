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

        $mm = Menu::firstOrCreate(['url' => 'wakilkepalasekolah'], ['name' => 'Wakil Kepala Sekolah', 'category' => 'MANAJEMEN SEKOLAH', 'icon' => 'contacts-book-2']);
        $this->attachMenupermission($mm, ['read'], ['wakasek']);

        $sm = $mm->subMenus()->create(['name' => 'Agenda Wakasek', 'url' => $mm->url . '/agenda-kegiatan-wakasek', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['wakasek']);

        $sm = $mm->subMenus()->create(['name' => 'Anggaran Wakasek', 'url' => $mm->url . '/anggaran-wakasek', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['wakasek']);
    }
}
