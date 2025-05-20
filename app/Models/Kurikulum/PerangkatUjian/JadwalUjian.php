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
        'mata_pelajaran',
        'tingkat',
        'jam_ke',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
    ];
}
