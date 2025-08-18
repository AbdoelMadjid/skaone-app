<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuKaprodiSeeder extends Seeder
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
            $menuIds = Menu::where('url', 'kepalaprogramstudi')
                ->orWhere('url', 'like', 'kepalaprogramstudi%')
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
                DB::table('permissions')->where('name', 'like', '%kepalaprogramstudi%')->delete();

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            $mm = Menu::firstOrCreate(['url' => 'kepalaprogramstudi'], ['name' => 'Kepala Program Studi', 'category' => 'MANAJEMEN SEKOLAH', 'icon' => 'file-user']);
            $this->attachMenupermission($mm, ['read'], ['kaprog']);

            $sm = $mm->subMenus()->create(['name' => 'Uji Kompetensi Keahlian', 'url' => $mm->url . '/uji-kompetensi-keahlian', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);

            $sm = $mm->subMenus()->create(['name' => 'Agenda Kaprodi', 'url' => $mm->url . '/agenda-kegiatan-kaprodi', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);

            $sm = $mm->subMenus()->create(['name' => 'Pembagian Jam Ngajar', 'url' => $mm->url . '/pembagian-jam-ngajar', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);

            $sm = $mm->subMenus()->create(['name' => 'Laboratorium', 'url' => $mm->url . '/laboratorium', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);

            $sm = $mm->subMenus()->create(['name' => 'Anggaran Kaprodi', 'url' => $mm->url . '/anggaran-kaprodi', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['kaprog']);
        });
    }
}
