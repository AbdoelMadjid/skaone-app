<?php

namespace App\Models\WaliKelas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
    use HasFactory;
    protected $table = 'absensi_siswas';
    protected $fillable = [
        'kode_rombel',
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'nis',
        'sakit',
        'izin',
        'alfa',
        'jmlhabsen',
    ];
}
