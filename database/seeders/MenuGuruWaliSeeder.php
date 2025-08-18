<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuGuruWaliSeeder extends Seeder
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
            $menuIds = Menu::where('url', 'guruwali')
                ->orWhere('url', 'like', 'guruwali%')
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
                DB::table('permissions')->where('name', 'like', '%guruwali%')->delete();

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            // ====== Buat ulang data ======
            $mm = Menu::create([
                'url' => 'guruwali',
                'name' => 'Guru Wali',
                'category' => 'APLIKASI RAPORT',
                'icon' => 'account-pin-box'
            ]);
            $this->attachMenupermission($mm, ['read'], ['admin', 'guruwali']);

            $sm = $mm->subMenus()->create([
                'name' => 'Informasi',
                'url' => $mm->url . '/informasi-guruwali',
                'category' => $mm->category
            ]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin', 'guruwali']);

            $sm = $mm->subMenus()->create([
                'name' => 'Data Siswa',
                'url' => $mm->url . '/data-siswa-guruwali',
                'category' => $mm->category
            ]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin', 'guruwali']);

            $sm = $mm->subMenus()->create([
                'name' => 'Laporan',
                'url' => $mm->url . '/laporan-guruwali',
                'category' => $mm->category
            ]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin', 'guruwali']);
        });
    }
}
