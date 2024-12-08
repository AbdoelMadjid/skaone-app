<?php

namespace App\Models\GuruMapel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiDeskripsi extends Model
{
    use HasFactory;
    protected $table = 'nilai_deskripsi';

    protected $fillable = [
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'tingkat',
        'kode_rombel',
        'kel_mapel',
        'id_personil',
        'nis',
        'desk_nilai_tinggi',
        'desk_nilai_rendah',
    ];
}
