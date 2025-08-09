<?php

namespace App\Models\Pkl\KaprodiPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulAjar extends Model
{
    use HasFactory;
    protected $table = 'modul_ajars';
    protected $fillable = [
        'kode_modulajar',
        'tahunajaran',
        'kode_kk',
        'kode_cp',
        'nomor_tp',
        'isi_tp',
    ];
}
