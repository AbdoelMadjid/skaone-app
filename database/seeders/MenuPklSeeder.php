<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuPklSeeder extends Seeder
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
        $mm = Menu::firstOrCreate(['url' => 'administratorpkl'], ['name' => 'Administrator', 'category' => 'APLIKASI PKL', 'icon' => 'function']);
        $this->attachMenupermission($mm, ['read'], ['adminpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi', 'url' => $mm->url . '/informasi-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['adminpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Perusahaan', 'url' => $mm->url . '/perusahaan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['adminpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Peserta Prakerin', 'url' => $mm->url . '/peserta-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['adminpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Penempatan', 'url' => $mm->url . '/penempatan-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['adminpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Pembimbing', 'url' => $mm->url . '/pembimbing-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['adminpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Laporan', 'url' => $mm->url . '/laporan-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['adminpkl']);

        $mm = Menu::firstOrCreate(['url' => 'kaprodipkl'], ['name' => 'Ketua Program Studi', 'category' => 'APLIKASI PKL', 'icon' => 'briefcase']);
        $this->attachMenupermission($mm, ['read'], ['kaprodiak', 'kaprodibd', 'kaprodimp', 'kaprodirpl', 'kaproditkj']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi', 'url' => $mm->url . '/informasi-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprodiak', 'kaprodibd', 'kaprodimp', 'kaprodirpl', 'kaproditkj']);

        $sm = $mm->subMenus()->create(['name' => 'Modul Ajar', 'url' => $mm->url . '/modul-ajar', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprodiak', 'kaprodibd', 'kaprodimp', 'kaprodirpl', 'kaproditkj']);

        $sm = $mm->subMenus()->create(['name' => 'Peserta Prakerin', 'url' => $mm->url . '/peserta-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprodiak', 'kaprodibd', 'kaprodimp', 'kaprodirpl', 'kaproditkj']);

        $sm = $mm->subMenus()->create(['name' => 'Pembimbing', 'url' => $mm->url . '/pembimbing-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprodiak', 'kaprodibd', 'kaprodimp', 'kaprodirpl', 'kaproditkj']);

        $sm = $mm->subMenus()->create(['name' => 'Penempatan', 'url' => $mm->url . '/penempatan-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprodiak', 'kaprodibd', 'kaprodimp', 'kaprodirpl', 'kaproditkj']);

        $sm = $mm->subMenus()->create(['name' => 'Pembobotan', 'url' => $mm->url . '/pembobotan-nilai', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprodiak', 'kaprodibd', 'kaprodimp', 'kaprodirpl', 'kaproditkj']);

        $sm = $mm->subMenus()->create(['name' => 'Penilaian', 'url' => $mm->url . '/penilaian-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprodiak', 'kaprodibd', 'kaprodimp', 'kaprodirpl', 'kaproditkj']);

        $sm = $mm->subMenus()->create(['name' => 'Pelaporan', 'url' => $mm->url . '/pelaporan-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprodiak', 'kaprodibd', 'kaprodimp', 'kaprodirpl', 'kaproditkj']);


        $mm = Menu::firstOrCreate(['url' => 'pembimbingpkl'], ['name' => 'Pembimbing', 'category' => 'APLIKASI PKL', 'icon' => 'contacts']);
        $this->attachMenupermission($mm, ['read'], ['pembpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi', 'url' => $mm->url . '/informasi-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['pembpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Peserta Bimbingan', 'url' => $mm->url . '/peserta-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['pembpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Validasi Jurnal', 'url' => $mm->url . '/validasi-jurnal', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['pembpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Absensi', 'url' => $mm->url . '/absensi-bimbingan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['pembpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Penilaian', 'url' => $mm->url . '/penilaian-bimbingan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['pembpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Monitoring', 'url' => $mm->url . '/monitoring-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['pembpkl']);

        $sm = $mm->subMenus()->create(['name' => 'Pesan', 'url' => $mm->url . '/pesan-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['pembpkl']);

        $mm = Menu::firstOrCreate(['url' => 'pesertadidikpkl'], ['name' => 'Peserta', 'category' => 'APLIKASI PKL', 'icon' => 'account-pin-box']);
        $this->attachMenupermission($mm, ['read'], ['pesertapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi', 'url' => $mm->url . '/siswa-informasi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['pesertapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Jurnal PKL', 'url' => $mm->url . '/jurnal-siswa', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['pesertapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Absensi', 'url' => $mm->url . '/absensi-siswa', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['pesertapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Monitoring', 'url' => $mm->url . '/monitoring-siswa', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['pesertapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Pesan', 'url' => $mm->url . '/pesan-prakerin', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['pesertapkl']);
    }
}
