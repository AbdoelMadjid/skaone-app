<?php

namespace App\Models\GuruMapel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSumatif extends Model
{
    use HasFactory;
    protected $table = 'nilai_sumatif';

    protected $fillable = [
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'tingkat',
        'kode_rombel',
        'kel_mapel',
        'id_personil',
        'nis',
        'sts',
        'sas',
        'rerata_sumatif',
    ];
}
