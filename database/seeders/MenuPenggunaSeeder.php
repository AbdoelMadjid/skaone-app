<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuPenggunaSeeder extends Seeder
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
            $menuIds = Menu::where('url', 'manajemenpengguna')
                ->orWhere('url', 'like', 'manajemenpengguna%')
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
                DB::table('permissions')->where('name', 'like', '%manajemenpengguna%')->delete();

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            $mm = Menu::firstOrCreate(['url' => 'manajemenpengguna'], ['name' => 'Manajemen Pengguna', 'category' => 'KONFIGURASI', 'icon' => 'admin']);
            $this->attachMenupermission($mm, ['read'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Role', 'url' => $mm->url . '/roles', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Permission', 'url' => $mm->url . '/permissions', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Akses Role', 'url' => $mm->url . '/akses-role', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read', 'update'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Akses User', 'url' => $mm->url . '/akses-user', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read', 'update'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Users', 'url' => $mm->url . '/users', 'category' => $mm->category]);
            $this->attachMenupermission($sm, null, ['admin']);
        });
    }
}
