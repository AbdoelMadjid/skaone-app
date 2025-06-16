<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuKurikulumSeeder extends Seeder
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
        $mm = Menu::firstOrCreate(['url' => 'kurikulum'], ['name' => 'Kurikulum', 'category' => 'APLIKASI RAPORT', 'icon' => 'briefcase']);
        $this->attachMenupermission($mm, ['read'], ['admin']);

        // start childmenu perangkat kurikulum
        $sm = $mm->subMenus()->create(['name' => 'Perangkat Kurikulum', 'url' => $mm->url . '/perangkatkurikulum', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Versi Kurikulum', 'url' => $sm->url . '/versi-kurikulum', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Pengumuman', 'url' => $sm->url . '/pengumuman', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);
        // start childmenu perangkat kurikulum

        // start childmenu data kbm
        $sm = $mm->subMenus()->create(['name' => 'Data KBM', 'url' => $mm->url . '/datakbm', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Hari Efektif', 'url' => $sm->url . '/hari-efektif', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Peserta Didik Rombel', 'url' => $sm->url . '/peserta-didik-rombel', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Mata Pelajaran', 'url' => $sm->url . '/mata-pelajaran', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Capaian Pembelajaran', 'url' => $sm->url . '/capaian-pembelajaran', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'KBM Per Rombel', 'url' => $sm->url . '/kbm-per-rombel', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Kunci Data KBM', 'url' => $sm->url . '/kunci-data-kbm', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        // end childmenu data kbm

        // start childmenu dokumen guru
        $sm = $mm->subMenus()->create(['name' => 'Dokumen Guru', 'url' => $mm->url . '/dokumenguru', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Guru Mata Pelajaran', 'url' => $sm->url . '/arsip-gurumapel', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['read'], ['admin']);
        $csm = $sm->subMenus()->create(['name' => 'Wali Kelas', 'url' => $sm->url . '/arsip-walikelas', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['read'], ['admin']);
        // end childmenu dokumen guru

        // start childmenu dokumen siswa
        $sm = $mm->subMenus()->create(['name' => 'Dokumen Siswa', 'url' => $mm->url . '/dokumentsiswa', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Cetak Rapor', 'url' => $sm->url . '/cetak-rapor', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Leger Nilai', 'url' => $sm->url . '/leger-nilai', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Rapor P5', 'url' => $sm->url . '/rapor-p-lima', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Rapor PKL', 'url' => $sm->url . '/rapor-pkl', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Transkrip Nilai', 'url' => $sm->url . '/transkrip-nilai', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Ijazah', 'url' => $sm->url . '/ijazah', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Remedial Peserta Didik', 'url' => $sm->url . '/remedial-peserta-didik', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);
        // end childmenu dokumen siswa

        // start childmenu perangkat ujian
        $sm = $mm->subMenus()->create(['name' => 'Perangkat Ujian', 'url' => $mm->url . '/perangkatujian', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Identitas Ujian', 'url' => $sm->url . '/identitas-ujian', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Administrasi Ujian', 'url' => $sm->url . '/administrasi-ujian', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Pelaksanaan Ujian', 'url' => $sm->url . '/pelaksanaan-ujian', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);
        // end childmenu perangkat ujian

    }
}
