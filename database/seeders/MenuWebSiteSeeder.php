<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuWebSiteSeeder extends BaseMenuSeeder
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
            $menuIds = Menu::where('url', 'websiteapp')
                ->orWhere('url', 'like', 'websiteapp%')
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
            $mm = Menu::firstOrCreate(['url' => 'websiteapp'], ['name' => 'Web Site App', 'category' => 'KONFIGURASI', 'icon' => 'globe']);
            $this->attachMenupermission($mm, ['read'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Team Pengembang', 'url' => $mm->url . '/team-pengembang', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Kumpulan Faqs', 'url' => $mm->url . '/kumpulan-faqs', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Fitur Coding', 'url' => $mm->url . '/fitur-coding', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Photo Slide', 'url' => $mm->url . '/photo-slides', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Galery', 'url' => $mm->url . '/galery', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Photo Jurusan', 'url' => $mm->url . '/photo-jurusan', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Daily Messages', 'url' => $mm->url . '/daily-messages', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Events', 'url' => $mm->url . '/events', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Polling', 'url' => $mm->url . '/polling', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Photo Personil', 'url' => $mm->url . '/photo-personil', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Profil Jurusan', 'url' => $mm->url . '/profil-jurusan', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Logo Jurusan', 'url' => $mm->url . '/logo-jurusan', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);
        });
    }
}
