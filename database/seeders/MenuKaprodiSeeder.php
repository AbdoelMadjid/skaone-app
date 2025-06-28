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

        $mm = Menu::firstOrCreate(['url' => 'kaprodi'], ['name' => 'Kepala Program Studi', 'category' => 'MANAJEMEN SEKOLAH', 'icon' => 'file-user']);
        $this->attachMenupermission($mm, ['read'], ['kaprog']);

        $sm = $mm->subMenus()->create(['name' => 'Uji Kompetensi Keahlian', 'url' => $mm->url . '/uji-kompetensi-keahlian', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);

        $sm = $mm->subMenus()->create(['name' => 'Agenda Kaprodi', 'url' => $mm->url . '/agenda-kegiatan-kaprodi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);

        $sm = $mm->subMenus()->create(['name' => 'Pembagian Jam Ngajar', 'url' => $mm->url . '/pembagian-jam-ngajar', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);

        $sm = $mm->subMenus()->create(['name' => 'Laboratorium', 'url' => $mm->url . '/laboratorium', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);

        $sm = $mm->subMenus()->create(['name' => 'Anggaran Kaprodi', 'url' => $mm->url . '/anggaran-kaprodi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);
    }
}
