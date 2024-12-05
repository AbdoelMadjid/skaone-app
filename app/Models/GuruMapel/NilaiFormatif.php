<?php

namespace App\Models\GuruMapel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiFormatif extends Model
{
    use HasFactory;
    protected $table = 'nilai_formatif';

    protected $fillable = [
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'tingkat',
        'kode_rombel',
        'kel_mapel',
        'id_personil',
        'nis',
        'tp_isi_1',
        'tp_isi_2',
        'tp_isi_3',
        'tp_isi_4',
        'tp_isi_5',
        'tp_isi_6',
        'tp_isi_7',
        'tp_isi_8',
        'tp_isi_9',
        'tp_nilai_1',
        'tp_nilai_2',
        'tp_nilai_3',
        'tp_nilai_4',
        'tp_nilai_5',
        'tp_nilai_6',
        'tp_nilai_7',
        'tp_nilai_8',
        'tp_nilai_9',
        'rerata_formatif',
    ];
}
