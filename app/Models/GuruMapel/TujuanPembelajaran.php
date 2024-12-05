<?php

namespace App\Models\GuruMapel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanPembelajaran extends Model
{
    use HasFactory;
    protected $table = 'tujuan_pembelajarans';
    protected $fillable = [
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'tingkat',
        'kode_rombel',
        'kel_mapel',
        'id_personil',
        'kode_cp',
        'tp_kode',
        'tp_no',
        'tp_isi',
        'tp_desk_tinggi',
        'tp_desk_rendah',
    ];
}
