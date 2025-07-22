<?php

namespace App\Models\Prakerin\Panitia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrakerinPeserta extends Model
{
    use HasFactory;
    protected $table = 'prakerin_pesertas';
    protected $fillable = [
        'tahunajaran',
        'kode_kk',
        'nis',
    ];
}
