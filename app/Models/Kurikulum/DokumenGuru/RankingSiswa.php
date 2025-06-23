<?php

namespace App\Models\Kurikulum\DokumenGuru;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankingSiswa extends Model
{
    use HasFactory;
    protected $table = 'ranking_siswas';
    protected $fillable = [
        'tahunajaran',
        'ganjilgenap',
        'kode_kk',
        'rombel_kode',
        'rombel_nama',
        'tingkat',
        'nis',
        'nama_lengkap',
        'nilai_rata2',
    ];
}
