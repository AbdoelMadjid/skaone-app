<?php

namespace App\Models\Kurikulum\PerangkatUjian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalUjian extends Model
{
    use HasFactory;
    protected $table = 'jadwal_ujians';
    protected $fillable = [
        'kode_ujian',
        'kode_kk',
        'tingkat',
        'tanggal',
        'jam_ke',
        'jam_ujian',
        'mata_pelajaran',
    ];
}
