<?php

namespace App\Models\Kurikulum\DokumenSiswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihRemedial extends Model
{
    use HasFactory;
    protected $table = 'pilih_remedials';
    protected $fillable = [
        'id_user',
        'tahun_masuk',
        'kode_kk',
        'tahun_ajaran',
        'tingkat',
        'kode_rombel',
    ];
}
