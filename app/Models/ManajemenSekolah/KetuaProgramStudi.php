<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetuaProgramStudi extends Model
{
    use HasFactory;
    protected $table = 'ketua_program_studis';
    protected $fillable = [
        'jabatan',
        'id_kk',
        'id_personil',
        'mulai_tahun',
        'akhir_tahun',
    ];
}
