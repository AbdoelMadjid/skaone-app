<?php

namespace App\Models\Kurikulum\PerangkatUjian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianIdentitas extends Model
{
    use HasFactory;
    protected $table = 'ujian_identitas';
    protected $fillable = [
        'tahun_ajaran',
        'semester',
        'nama_ujian',
        'kode_ujian',
        'tgl_ujian_awal',
        'tgl_ujian_akhir',
        'titimangsa_ujian',
    ];
}
