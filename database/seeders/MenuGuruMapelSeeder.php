<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuGuruMapelSeeder extends BaseMenuSeeder
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
            $menuIds = Menu::where('url', 'gurumapel')
                ->orWhere('url', 'like', 'gurumapel%')
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

                // 🔹 Cari permissions orphan KHUSUS untuk menu ini
                $orphanPermissionIds = DB::table('permissions')
                    ->whereNotIn('id', function ($query) {
                        $query->select('permission_id')->from('menu_permission');
                    })
                    ->whereIn('name', Menu::whereIn('id', $menuIds)->pluck('url')) // exact match
                    ->pluck('id');

                if ($orphanPermissionIds->isNotEmpty()) {
                    DB::table('permissions')->whereIn('id', $orphanPermissionIds)->delete();
                }

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            // guru mapel
            $mm = Menu::firstOrCreate(['url' => 'gurumapel'], ['name' => 'Guru Mata Pelajaran', 'category' => 'APLIKASI RAPORT', 'icon' => 'file-user']);
            $this->attachMenupermission($mm, ['read'], ['gmapel']);

            $sm = $mm->subMenus()->create(['name' => 'Administrasi Guru', 'url' => $mm->url . '/adminguru', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Data Ngajar', 'url' => $sm->url . '/data-kbm', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Capaian Pembelajaran', 'url' => $sm->url . '/capaian-pembelajaran', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Tujuan Pembelajaran', 'url' => $sm->url . '/tujuan-pembelajaran', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Modul Ajar PDF', 'url' => $sm->url . '/modul-ajar-gurumapel', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Ujian Sumatif', 'url' => $sm->url . '/ujian-sumatif', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Ajuan Remedial', 'url' => $sm->url . '/ajuan-remedial', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Perangkat ajar', 'url' => $sm->url . '/perangkat-ajar', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Arsip KBM', 'url' => $sm->url . '/arsip-kbm', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $sm = $mm->subMenus()->create(['name' => 'Penilaian', 'url' => $mm->url . '/penilaian', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Formatif', 'url' => $sm->url . '/formatif', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Sumatif', 'url' => $sm->url . '/sumatif', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);

            $csm = $sm->subMenus()->create(['name' => 'Deskripsi Nilai', 'url' => $sm->url . '/deskripsi-nilai', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['gmapel']);
        });
    }
}
