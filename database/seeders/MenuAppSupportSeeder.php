<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuAppSupportSeeder extends BaseMenuSeeder
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
            $menuIds = Menu::where('url', 'appsupport')
                ->orWhere('url', 'like', 'appsupport%')
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
            //tools
            $mm = Menu::firstOrCreate(['url' => 'appsupport'], ['name' => 'App Support', 'category' => 'KONFIGURASI', 'icon' => 'tools']);
            $this->attachMenupermission($mm, ['read'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Menu', 'url' => $mm->url . '/menu', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete', 'sort'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'App Profil', 'url' => $mm->url . '/app-profil', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'App Fitur', 'url' => $mm->url . '/app-fiturs', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Impor Data Master', 'url' => $mm->url . '/impor-data-master', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Ekspor Data Master', 'url' => $mm->url . '/ekspor-data-master', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Backup DB', 'url' => $mm->url . '/backup-db', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Data Login', 'url' => $mm->url . '/data-login', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Referensi', 'url' => $mm->url . '/referensi', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);
        });
    }
}
