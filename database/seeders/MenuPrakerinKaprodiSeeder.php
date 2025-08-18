<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuPrakerinKaprodiSeeder extends Seeder
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
            $menuIds = Menu::where('url', 'kaprogprakerin')
                ->orWhere('url', 'like', 'kaprogprakerin%')
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
                DB::table('permissions')->where('name', 'like', '%kaprogprakerin%')->delete();

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

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
        });
    }
}
