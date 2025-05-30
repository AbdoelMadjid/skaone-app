<?php

namespace App\Models\Kurikulum\PerangkatUjian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanitiaUjian extends Model
{
    use HasFactory;
    protected $table = 'panitia_ujians';
    protected $fillable = [
        'kode_ujian',
        'id_personil',
        'nip',
        'nama_lengkap',
        'jabatan',
    ];
}
