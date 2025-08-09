<?php

namespace App\Models\Pkl\PembimbingPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPrakerin extends Model
{
    use HasFactory;
    protected $table = 'nilai_prakerin';
    protected $fillable = [
        'tahun_ajaran',
        'nis',
        'absen',
        'cp1',
        'cp2',
        'cp3',
        'cp4',
    ];
}
