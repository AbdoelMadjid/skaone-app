<?php

namespace App\Models\Kurikulum\DokumenGuru;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihArsipGuru extends Model
{
    use HasFactory;
    protected $table = 'pilih_arsip_gurus';
    protected $fillable = [
        'id_user',
        'tahunajaran',
        'semester',
        'jenis_arsip',
        'id_guru',
    ];
}
