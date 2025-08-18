<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuManajemenSekolahSeeder extends Seeder
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
            $menuIds = Menu::where('url', 'manajemensekolah')
                ->orWhere('url', 'like', 'manajemensekolah%')
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
                DB::table('permissions')->where('name', 'like', '%manajemensekolah%')->delete();

                // Hapus menus
                DB::table('menus')->whereIn('id', $menuIds)->delete();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }

            //manajemen sekolah
            $mm = Menu::firstOrCreate(['url' => 'manajemensekolah'], ['name' => 'Manajemen Sekolah', 'category' => 'APLIKASI RAPORT', 'icon' => 'building']);
            $this->attachMenupermission($mm, ['read'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Tahun Ajaran', 'url' => $mm->url . '/tahun-ajaran', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Identitas Sekolah', 'url' => $mm->url . '/identitas-sekolah', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            // start Data Keahlian
            $sm = $mm->subMenus()->create(['name' => 'Data Keahlian', 'url' => $mm->url . '/datakeahlian', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Bidang Keahlian', 'url' => $sm->url . '/bidang-keahlian', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Program Keahlian', 'url' => $sm->url . '/program-keahlian', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Kompetensi Keahlian', 'url' => $sm->url . '/kompetensi-keahlian', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);
            // end Data Keahlian

            $sm = $mm->subMenus()->create(['name' => 'Personil Sekolah', 'url' => $mm->url . '/personil-sekolah', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            // start childmenu tim manajemen
            $sm = $mm->subMenus()->create(['name' => 'Tim Manajemen', 'url' => $mm->url . '/timmanajemen', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Kepala Sekolah', 'url' => $sm->url . '/kepala-sekolah', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Wakil Kepala Sekolah', 'url' => $sm->url . '/wakil-kepala-sekolah', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Ketua Program Studi', 'url' => $sm->url . '/ketua-program-studi', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Jabatan Lain', 'url' => $sm->url . '/jabatan-lain', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);
            // end childmenu tim manajemen

            $sm = $mm->subMenus()->create(['name' => 'Rombongan Belajar', 'url' => $mm->url . '/rombongan-belajar', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Wali Kelas', 'url' => $mm->url . '/wali-kelas', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

            $sm = $mm->subMenus()->create(['name' => 'Peserta Didik', 'url' => $mm->url . '/peserta-didik', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);
        });
    }
}
