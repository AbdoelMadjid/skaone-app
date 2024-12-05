<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdentitasSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('identitas_sekolah')->insert([
            'npsn' => '20213871',
            'nama_sekolah' => 'SMKN 1 KADIPATEN',
            'status' => 'Negeri',
            'alamat_jalan' => 'Jl. Siliwang',
            'alamat_no' => '73',
            'alamat_blok' => 'Jamiasih',
            'alamat_rt' => '001',
            'alamat_rw' => '002',
            'alamat_desa' => 'Liangjulang',
            'alamat_kec' => 'Kadipaten',
            'alamat_kab' => 'Majalengka',
            'alamat_provinsi' => 'Jawa Barat',
            'alamat_kodepos' => '45452',
            'alamat_telepon' => '0233661434',
            'alamat_website' => 'https://www.smkn1kadipaten.sch.id',
            'alamat_email' => 'info@smkn1kadipaten.sch.id',
            'logo_sekolah' => 'logosmk-big.png', // jika memiliki path
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
