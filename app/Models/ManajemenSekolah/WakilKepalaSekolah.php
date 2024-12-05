<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WakilKepalaSekolah extends Model
{
    use HasFactory;
    protected $table = 'wakil_kepala_sekolahs';
    protected $fillable = [
        'jabatan',
        'namalengkap',
        'mulai_tahun',
        'akhir_tahun',
    ];
}
