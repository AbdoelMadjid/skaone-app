<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuTataUsahaSeeder extends Seeder
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
            $menuIds = Menu::where('url', 'ketatausahaan')
                ->orWhere('url', 'like', 'ketatausahaan%')
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
                DB::table('permissions')->where('name', 'like', '%ketatausahaan%')->delete();

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            $mm = Menu::firstOrCreate(['url' => 'ketatausahaan'], ['name' => 'Tata Usaha', 'category' => 'MANAJEMEN SEKOLAH', 'icon' => 'pages']);
            $this->attachMenupermission($mm, ['read'], ['tatausaha']);

            $sm = $mm->subMenus()->create(['name' => 'Persuratan', 'url' => $mm->url . '/persuratan', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);

            $sm = $mm->subMenus()->create(['name' => 'Sarana Prasarana', 'url' => $mm->url . '/sarana-prasarana', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);

            $sm = $mm->subMenus()->create(['name' => 'Manajemen Barang', 'url' => $mm->url . '/manajemen-barang', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);

            $sm = $mm->subMenus()->create(['name' => 'Agenda Ketatausahaan', 'url' => $mm->url . '/agenda-ketatausahaan', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);

            $sm = $mm->subMenus()->create(['name' => 'Anggaran Ketatausahaan', 'url' => $mm->url . '/anggaran-ketatausahaan', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['tatausaha']);
        });
    }
}
