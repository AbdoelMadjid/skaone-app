<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class MenuKurikulumSeeder extends BaseMenuSeeder
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
            $menuIds = Menu::where('url', 'kurikulum')
                ->orWhere('url', 'like', 'kurikulum%')
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

            // kurikulum
            $mm = Menu::firstOrCreate(['url' => 'kurikulum'], ['name' => 'Kurikulum', 'category' => 'APLIKASI RAPORT', 'icon' => 'briefcase']);
            $this->attachMenupermission($mm, ['read'], ['admin']);

            // start childmenu perangkat kurikulum
            $sm = $mm->subMenus()->create(['name' => 'Perangkat Kurikulum', 'url' => $mm->url . '/perangkatkurikulum', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Versi Kurikulum', 'url' => $sm->url . '/versi-kurikulum', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Pengumuman', 'url' => $sm->url . '/pengumuman', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Berkas Cetak', 'url' => $sm->url . '/berkas-cetak', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['read'], ['admin']);
            // start childmenu perangkat kurikulum

            // start childmenu data kbm
            $sm = $mm->subMenus()->create(['name' => 'Data KBM', 'url' => $mm->url . '/datakbm', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Hari Efektif', 'url' => $sm->url . '/hari-efektif', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Jadwal Mingguan', 'url' => $sm->url . '/jadwal-mingguan', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Peserta Didik Rombel', 'url' => $sm->url . '/peserta-didik-rombel', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Mata Pelajaran', 'url' => $sm->url . '/mata-pelajaran', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Capaian Pembelajaran', 'url' => $sm->url . '/capaian-pembelajaran', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'KBM Per Rombel', 'url' => $sm->url . '/kbm-per-rombel', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Kunci Data KBM', 'url' => $sm->url . '/kunci-data-kbm', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            // end childmenu data kbm

            // start childmenu dokumen guru
            $sm = $mm->subMenus()->create(['name' => 'Dokumen Guru', 'url' => $mm->url . '/dokumenguru', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Perangkat Ajar', 'url' => $sm->url . '/arsip-perangkat-ajar', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['read'], ['admin']);
            $csm = $sm->subMenus()->create(['name' => 'Guru Mata Pelajaran', 'url' => $sm->url . '/arsip-gurumapel', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['read'], ['admin']);
            $csm = $sm->subMenus()->create(['name' => 'Wali Kelas', 'url' => $sm->url . '/arsip-walikelas', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['read'], ['admin']);
            // end childmenu dokumen guru

            // start childmenu dokumen siswa
            $sm = $mm->subMenus()->create(['name' => 'Dokumen Siswa', 'url' => $mm->url . '/dokumentsiswa', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Cetak Rapor', 'url' => $sm->url . '/cetak-rapor', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Leger Nilai', 'url' => $sm->url . '/leger-nilai', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Rapor P5', 'url' => $sm->url . '/rapor-p-lima', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Rapor PKL', 'url' => $sm->url . '/rapor-pkl', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Transkrip Nilai', 'url' => $sm->url . '/transkrip-nilai', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Ijazah', 'url' => $sm->url . '/ijazah', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Remedial Peserta Didik', 'url' => $sm->url . '/remedial-peserta-didik', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);
            // end childmenu dokumen siswa

            // start childmenu perangkat ujian
            $sm = $mm->subMenus()->create(['name' => 'Perangkat Ujian', 'url' => $mm->url . '/perangkatujian', 'category' => $mm->category]);
            $this->attachMenupermission($sm, ['read'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Identitas Ujian', 'url' => $sm->url . '/identitas-ujian', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Administrasi Ujian', 'url' => $sm->url . '/administrasi-ujian', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);

            $csm = $sm->subMenus()->create(['name' => 'Pelaksanaan Ujian', 'url' => $sm->url . '/pelaksanaan-ujian', 'category' => $sm->category]);
            $this->attachMenupermission($csm, ['create', 'read', 'update', 'delete'], ['admin']);
            // end childmenu perangkat ujian
        });
    }
}
