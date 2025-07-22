<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuPrakerinSeeder extends Seeder
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
        $mm = Menu::firstOrCreate(['url' => 'panitiaprakerin'], ['name' => 'Panitia', 'category' => 'APLIKASI PRAKERIN', 'icon' => 'function']);
        $this->attachMenupermission($mm, ['read'], ['panitiapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi', 'url' => $mm->url . '/informasi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['panitiapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Perusahaan', 'url' => $mm->url . '/perusahaan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['panitiapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Peserta', 'url' => $mm->url . '/peserta', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['panitiapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Administrasi', 'url' => $mm->url . '/administrasi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['panitiapkl']);

        $sm = $mm->subMenus()->create(['name' => 'Laporan', 'url' => $mm->url . '/laporan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['panitiapkl']);

        $mm = Menu::firstOrCreate(['url' => 'kaprogprakerin'], ['name' => 'Program Studi Prakerin', 'category' => 'APLIKASI PRAKERIN', 'icon' => 'briefcase']);
        $this->attachMenupermission($mm, ['read'], ['kaprakerinak', 'kaprakerinbd', 'kaprakerinmp', 'kaprakerinrpl', 'kaprakerintkj']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi', 'url' => $mm->url . '/informasi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprakerinak', 'kaprakerinbd', 'kaprakerinmp', 'kaprakerinrpl', 'kaprakerintkj']);

        $sm = $mm->subMenus()->create(['name' => 'Modul Ajar', 'url' => $mm->url . '/modul-ajar', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprakerinak', 'kaprakerinbd', 'kaprakerinmp', 'kaprakerinrpl', 'kaprakerintkj']);

        $sm = $mm->subMenus()->create(['name' => 'Penempatan', 'url' => $mm->url . '/penempatan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprakerinak', 'kaprakerinbd', 'kaprakerinmp', 'kaprakerinrpl', 'kaprakerintkj']);

        $sm = $mm->subMenus()->create(['name' => 'Pembimbing', 'url' => $mm->url . '/pembimbing', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprakerinak', 'kaprakerinbd', 'kaprakerinmp', 'kaprakerinrpl', 'kaprakerintkj']);

        $sm = $mm->subMenus()->create(['name' => 'Penilaian', 'url' => $mm->url . '/penilaian', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprakerinak', 'kaprakerinbd', 'kaprakerinmp', 'kaprakerinrpl', 'kaprakerintkj']);

        $sm = $mm->subMenus()->create(['name' => 'Pelaporan', 'url' => $mm->url . '/pelaporan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprakerinak', 'kaprakerinbd', 'kaprakerinmp', 'kaprakerinrpl', 'kaprakerintkj']);


        $mm = Menu::firstOrCreate(['url' => 'gurupembimbingpkl'], ['name' => 'Guru Pembimbing PKL', 'category' => 'APLIKASI PRAKERIN', 'icon' => 'contacts']);
        $this->attachMenupermission($mm, ['read'], ['guruprakerin']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi', 'url' => $mm->url . '/informasi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['guruprakerin']);

        $sm = $mm->subMenus()->create(['name' => 'Peserta Bimbingan', 'url' => $mm->url . '/peserta-bimbingan', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['guruprakerin']);

        $sm = $mm->subMenus()->create(['name' => 'Validasi Jurnal', 'url' => $mm->url . '/validasi-jurnal', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['guruprakerin']);

        $sm = $mm->subMenus()->create(['name' => 'Absensi Peserta', 'url' => $mm->url . '/absensi-peserta', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['guruprakerin']);

        $sm = $mm->subMenus()->create(['name' => 'Penilaian Peserta', 'url' => $mm->url . '/penilaian-peserta', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['guruprakerin']);


        $mm = Menu::firstOrCreate(['url' => 'siswapesertapkl'], ['name' => 'Siswa Peserta PKL', 'category' => 'APLIKASI PRAKERIN', 'icon' => 'account-pin-box']);
        $this->attachMenupermission($mm, ['read'], ['siswaprakerin']);

        $sm = $mm->subMenus()->create(['name' => 'Informasi', 'url' => $mm->url . '/informasi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['siswaprakerin']);

        $sm = $mm->subMenus()->create(['name' => 'Jurnal', 'url' => $mm->url . '/jurnal', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['siswaprakerin']);

        $sm = $mm->subMenus()->create(['name' => 'Absensi', 'url' => $mm->url . '/absensi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['siswaprakerin']);
    }
}
