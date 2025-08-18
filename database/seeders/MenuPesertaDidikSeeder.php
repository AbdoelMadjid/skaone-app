<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuPesertaDidikSeeder extends Seeder
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
            $menuIds = Menu::where('url', 'pesertadidik')
                ->orWhere('url', 'like', 'pesertadidik%')
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
                DB::table('permissions')->where('name', 'like', '%pesertadidik%')->delete();

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            $mm = Menu::firstOrCreate(['url' => 'pesertadidik'], ['name' => 'Peserta Didik', 'category' => 'PESERTA DIDIK', 'icon' => 'account-pin-box']);
            $this->attachMenupermission($mm, ['read'], ['siswa']);

            $sm = $mm->subMenus()->create(['name' => 'Formatif', 'url' => $mm->url . '/test-formatif', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['siswa']);

            $sm = $mm->subMenus()->create(['name' => 'Sumatif', 'url' => $mm->url . '/test-sumatif', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['siswa']);

            $sm = $mm->subMenus()->create(['name' => 'Raport', 'url' => $mm->url . '/raport-peserta-didik', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['siswa']);

            $sm = $mm->subMenus()->create(['name' => 'Transkrip Nilai', 'url' => $mm->url . '/transkrip-peserta-didik', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['siswa']);

            $sm = $mm->subMenus()->create(['name' => 'Remedial', 'url' => $mm->url . '/remedial-peserta-didik', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['siswa']);

            $sm = $mm->subMenus()->create(['name' => 'Kelulusan', 'url' => $mm->url . '/kelulusan-peserta-didik', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['siswa']);
        });
    }
}
