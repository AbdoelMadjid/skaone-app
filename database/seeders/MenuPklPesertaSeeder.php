<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuPklPesertaSeeder extends Seeder
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
            $menuIds = Menu::where('url', 'pesertapkl')
                ->orWhere('url', 'like', 'pesertapkl%')
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
                DB::table('permissions')->where('name', 'like', '%pesertapkl%')->delete();

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            $mm = Menu::firstOrCreate(['url' => 'pesertapkl'], ['name' => 'Peserta', 'category' => 'APLIKASI PKL', 'icon' => 'account-pin-box']);
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
        });
    }
}
