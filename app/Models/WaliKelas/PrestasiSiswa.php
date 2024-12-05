<?php

namespace App\Models\WaliKelas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiSiswa extends Model
{
    use HasFactory;
    protected $table = 'prestasi_siswas';
    protected $fillable = [
        'kode_rombel',
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'nis',
        'jenis',
        'tingkat',
        'juarake',
        'namalomba',
        'tanggal',
        'tempat',
    ];
}
