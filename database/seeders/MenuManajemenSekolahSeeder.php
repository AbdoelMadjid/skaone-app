<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuManajemenSekolahSeeder extends Seeder
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

        //manajemen sekolah
        $mm = Menu::firstOrCreate(['url' => 'manajemensekolah'], ['name' => 'Manajemen Sekolah', 'category' => 'APLIKASI RAPORT', 'icon' => 'building']);
        $this->attachMenupermission($mm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Tahun Ajaran', 'url' => $mm->url . '/tahun-ajaran', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Identitas Sekolah', 'url' => $mm->url . '/identitas-sekolah', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        // start Data Keahlian
        $sm = $mm->subMenus()->create(['name' => 'Data Keahlian', 'url' => $mm->url . '/datakeahlian', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Bidang Keahlian', 'url' => $sm->url . '/bidang-keahlian', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Program Keahlian', 'url' => $sm->url . '/program-keahlian', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Kompetensi Keahlian', 'url' => $sm->url . '/kompetensi-keahlian', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);
        // end Data Keahlian

        $sm = $mm->subMenus()->create(['name' => 'Personil Sekolah', 'url' => $mm->url . '/personil-sekolah', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        // start childmenu tim manajemen
        $sm = $mm->subMenus()->create(['name' => 'Tim Manajemen', 'url' => $mm->url . '/timmanajemen', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Kepala Sekolah', 'url' => $sm->url . '/kepala-sekolah', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Wakil Kepala Sekolah', 'url' => $sm->url . '/wakil-kepala-sekolah', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Ketua Program Studi', 'url' => $sm->url . '/ketua-program-studi', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Jabatan Lain', 'url' => $sm->url . '/jabatan-lain', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);
        // end childmenu tim manajemen

        $sm = $mm->subMenus()->create(['name' => 'Rombongan Belajar', 'url' => $mm->url . '/rombongan-belajar', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Wali Kelas', 'url' => $mm->url . '/wali-kelas', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Peserta Didik', 'url' => $mm->url . '/peserta-didik', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);
    }
}
