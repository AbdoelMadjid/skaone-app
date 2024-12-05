<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika diperlukan
        DB::table('referensis')->truncate();

        DB::table('referensis')->insert([
            ['jenis' => 'Agama', 'data' => 'Islam'],
            ['jenis' => 'Agama', 'data' => 'Protestan'],
            ['jenis' => 'Agama', 'data' => 'Katolik'],
            ['jenis' => 'Agama', 'data' => 'Hindu'],
            ['jenis' => 'Agama', 'data' => 'Budha'],
            ['jenis' => 'Agama', 'data' => 'Kong Hu Cu'],
            ['jenis' => 'Agama', 'data' => 'Advent'],
            ['jenis' => 'Jabatan', 'data' => 'Kepala Sekolah'],
            ['jenis' => 'Jabatan', 'data' => 'Wakil Kepala Sekolah'],
            ['jenis' => 'Jabatan', 'data' => 'Ketua Program Studi'],
            ['jenis' => 'Jabatan', 'data' => 'Kepala Laboratorium'],
            ['jenis' => 'Jabatan', 'data' => 'Staf Wakasek'],
            ['jenis' => 'Jabatan Wakasek', 'data' => 'Bidang Kurikulum/Akademik'],
            ['jenis' => 'Jabatan Wakasek', 'data' => 'Bidang Kesiswaan'],
            ['jenis' => 'Jabatan Wakasek', 'data' => 'Bidang Hubungan Industri/Masyarakat'],
            ['jenis' => 'Jabatan Wakasek', 'data' => 'Bidang Sarana Prasarana'],
            ['jenis' => 'Jabatan Wakasek', 'data' => 'Staf Wakasek Kurikulum/Akademik'],
            ['jenis' => 'Jabatan Wakasek', 'data' => 'Staf Wakasek Kesiswaan'],
            ['jenis' => 'Jabatan Wakasek', 'data' => 'Staf Wakasek Hubungan Industri/Masyarakat'],
            ['jenis' => 'Jabatan Wakasek', 'data' => 'Staf Wakasek Sarana Prasarana'],
            ['jenis' => 'Pekerjaan', 'data' => 'PNS'],
            ['jenis' => 'Pekerjaan', 'data' => 'TNI'],
            ['jenis' => 'Pekerjaan', 'data' => 'POLRI'],
            ['jenis' => 'Pekerjaan', 'data' => 'Pegawai BUMN'],
            ['jenis' => 'Pekerjaan', 'data' => 'Pegawai BUMB'],
            ['jenis' => 'Pekerjaan', 'data' => 'Pegawai Swasta'],
            ['jenis' => 'Pekerjaan', 'data' => 'Wiraswasta'],
            ['jenis' => 'Pekerjaan', 'data' => 'Buruh'],
            ['jenis' => 'Pekerjaan', 'data' => 'Buruh Pabrik'],
            ['jenis' => 'Pekerjaan', 'data' => 'Buruh Tani'],
            ['jenis' => 'Pekerjaan', 'data' => 'Ibu Rumah Tanggal'],
            ['jenis' => 'Pekerjaan', 'data' => 'Lainnya'],
            ['jenis' => 'KodeMapel', 'data' => 'UM'],
            ['jenis' => 'KodeMapel', 'data' => 'KJR'],
            ['jenis' => 'KodeMapel', 'data' => 'DPK-AK'],
            ['jenis' => 'KodeMapel', 'data' => 'KK-AK'],
            ['jenis' => 'KodeMapel', 'data' => 'MPP-AK'],
            ['jenis' => 'KodeMapel', 'data' => 'DPK-BD'],
            ['jenis' => 'KodeMapel', 'data' => 'KK-BD'],
            ['jenis' => 'KodeMapel', 'data' => 'MPP-BD'],
            ['jenis' => 'KodeMapel', 'data' => 'DPK-MP'],
            ['jenis' => 'KodeMapel', 'data' => 'KK-MP'],
            ['jenis' => 'KodeMapel', 'data' => 'MPP-MP'],
            ['jenis' => 'KodeMapel', 'data' => 'DPK-RPL'],
            ['jenis' => 'KodeMapel', 'data' => 'KK-RPL'],
            ['jenis' => 'KodeMapel', 'data' => 'MPP-RPL'],
            ['jenis' => 'KodeMapel', 'data' => 'DPK-TKJ'],
            ['jenis' => 'KodeMapel', 'data' => 'KK-TKJ'],
            ['jenis' => 'KodeMapel', 'data' => 'MPP-TKJ'],
            ['jenis' => 'JabatanTeam', 'data' => 'Programming & Scripting'],
            ['jenis' => 'JabatanTeam', 'data' => 'Database Management'],
            ['jenis' => 'JabatanTeam', 'data' => 'End-User Management'],
            ['jenis' => 'JabatanTeam', 'data' => 'Style Management'],
            ['jenis' => 'JabatanTeam', 'data' => 'Review & Feed-back Management'],
            ['jenis' => 'JabatanTeam', 'data' => 'Nettworking Management'],
        ]);
    }
}
