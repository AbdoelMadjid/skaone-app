<?php

namespace App\Models\Kurikulum\DokumenGuru;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihArsipWaliKelas extends Model
{
    use HasFactory;
    protected $table = 'pilih_arsip_wali_kelas';
    protected $fillable = [
        'id_user',
        'tahunajaran',
        'kode_kk',
        'tingkat',
        'kode_rombel',
        'ganjilgenap',
        'pilih_dokumen',
    ];
}
