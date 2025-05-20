<?php

namespace App\Models\Kurikulum\PerangkatUjian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaUjian extends Model
{
    use HasFactory;
    protected $table = 'ruang_ujians';
    protected $fillable = [
        'kode_ujian',
        'nis',
        'kelas',
        'nomor_peserta',
        'nomor_ruang',
        'kode_posisi_kelas',
    ];
}
