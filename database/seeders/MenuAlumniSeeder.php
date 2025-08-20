<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuAlumniSeeder extends BaseMenuSeeder
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
            $menuIds = Menu::where('url', 'alumni')
                ->orWhere('url', 'like', 'alumni%')
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

            $mm = Menu::firstOrCreate(['url' => 'alumni'], ['name' => 'Alumni', 'category' => 'PESERTA DIDIK', 'icon' => 'group']);
            $this->attachMenupermission($mm, ['read'], ['alumni']);

            $sm = $mm->subMenus()->create(['name' => 'Riwayat Kerja', 'url' => $mm->url . '/riwayat-kerja', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['alumni']);

            $sm = $mm->subMenus()->create(['name' => 'Informasi Alumni', 'url' => $mm->url . '/informasi-alumni', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['alumni']);

            $sm = $mm->subMenus()->create(['name' => 'Arsip Transkrip', 'url' => $mm->url . '/arsip-transkrip', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['alumni']);

            $sm = $mm->subMenus()->create(['name' => 'Arsip Kelulusan', 'url' => $mm->url . '/arsip-kelulusan', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['alumni']);
        });
    }
}
