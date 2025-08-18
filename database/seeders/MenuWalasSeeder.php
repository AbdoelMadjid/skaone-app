<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuWalasSeeder extends Seeder
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

        DB::transaction(function () {
            // ====== Hapus data lama ======
            $menuIds = Menu::where('url', 'walikelas')
                ->orWhere('url', 'like', 'walikelas%')
                ->pluck('id');

            if ($menuIds->isNotEmpty()) {
                // Ambil semua permission_id yang terkait
                $permissionIds = DB::table('menu_permission')
                    ->whereIn('menu_id', $menuIds)
                    ->pluck('permission_id');

                DB::statement('SET FOREIGN_KEY_CHECKS=0;');

                // Hapus role_has_permissions
                DB::table('role_has_permissions')->whereIn('permission_id', $permissionIds)->delete();

                // Hapus relasi menu_permission
                DB::table('menu_permission')->whereIn('menu_id', $menuIds)->delete();

                // Hapus permissions berdasarkan ID relasi
                DB::table('permissions')->whereIn('id', $permissionIds)->delete();

                // 🔹 Pastikan hapus permission yang URL-nya mirip (antisipasi orphan permission)
                DB::table('permissions')->where('name', 'like', '%walikelas%')->delete();

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            // wali kelas
            $mm = Menu::firstOrCreate(['url' => 'walikelas'], ['name' => 'Wali Kelas', 'category' => 'APLIKASI RAPORT', 'icon' => 'shield-user']);
            $this->attachMenupermission($mm, ['read'], ['walas']);

            $sm = $mm->subMenus()->create(['name' => 'Data Kelas', 'url' => $mm->url . '/data-kelas', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

            $sm = $mm->subMenus()->create(['name' => 'Identitas Siswa', 'url' => $mm->url . '/identitas-siswa', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

            $sm = $mm->subMenus()->create(['name' => 'Absensi Siswa', 'url' => $mm->url . '/absensi-siswa', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

            $sm = $mm->subMenus()->create(['name' => 'Ekstrakulikuler', 'url' => $mm->url . '/ekstrakulikuler', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

            $sm = $mm->subMenus()->create(['name' => 'Prestasi Siswa', 'url' => $mm->url . '/prestasi-siswa', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

            $sm = $mm->subMenus()->create(['name' => 'Catatan Wali Kelas', 'url' => $mm->url . '/catatan-wali-kelas', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['walas']);

            $sm = $mm->subMenus()->create(['name' => 'Rapor Peserta Didik', 'url' => $mm->url . '/rapor-peserta-didik', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['walas']);

            $sm = $mm->subMenus()->create(['name' => 'Cek Remedial', 'url' => $mm->url . '/cek-remedial-siswa', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['walas']);

            $sm = $mm->subMenus()->create(['name' => 'Arsip Walas', 'url' => $mm->url . '/arsip-walas', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['walas']);
        });
    }
}
