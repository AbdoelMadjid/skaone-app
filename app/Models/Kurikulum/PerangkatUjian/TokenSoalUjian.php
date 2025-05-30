<?php

namespace App\Models\Kurikulum\PerangkatUjian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenSoalUjian extends Model
{
    use HasFactory;
    protected $table = 'token_soal_ujians';
    protected $fillable = [
        'kode_ujian',
        'tanggal_ujian',
        'sesi_ujian',
        'matapelajaran',
        'kelas',
        'token_soal',
    ];
}
