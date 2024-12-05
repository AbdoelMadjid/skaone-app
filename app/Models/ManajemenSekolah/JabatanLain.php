<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanLain extends Model
{
    use HasFactory;
    protected $table = 'jabatan_lains';
    protected $fillable = [
        'jabatan',
        'namalengkap',
        'mulai_tahun',
        'akhir_tahun',
    ];
}
