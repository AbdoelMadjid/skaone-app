<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasSekolah extends Model
{
    use HasFactory;
    protected $table = 'identitas_sekolah';

    protected $fillable = [
        'npsn',
        'nama_sekolah',
        'status',
        'alamat_jalan',
        'alamat_no',
        'alamat_blok',
        'alamat_rt',
        'alamat_rw',
        'alamat_desa',
        'alamat_kec',
        'alamat_kab',
        'alamat_provinsi',
        'alamat_kodepos',
        'alamat_telepon',
        'alamat_website',
        'alamat_email',
        'logo_sekolah'
    ];
}
