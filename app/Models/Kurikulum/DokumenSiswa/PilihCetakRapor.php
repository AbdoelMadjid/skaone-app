<?php

namespace App\Models\Kurikulum\DokumenSiswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihCetakRapor extends Model
{
    use HasFactory;
    protected $table = 'pilih_cetak_rapors';
    protected $fillable = [
        'id_personil',
        'tahunajaran',
        'semester',
        'kode_kk',
        'tingkat',
        'kode_rombel',
        'nis',
    ];
}
