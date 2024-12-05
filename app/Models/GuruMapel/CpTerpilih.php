<?php

namespace App\Models\GuruMapel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpTerpilih extends Model
{
    use HasFactory;
    protected $table = 'cp_terpilihs';
    protected $fillable = [
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'tingkat',
        'kode_rombel',
        'kel_mapel',
        'id_personil',
        'kode_cp',
        'jml_materi',
    ];
}
