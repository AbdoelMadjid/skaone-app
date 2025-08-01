<?php

namespace App\Models\Prakerin\Panitia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrakerinNegosiator extends Model
{
    use HasFactory;
    protected $table = 'prakerin_negosiators';
    protected $fillable = [
        'tahunajaran',
        'id_personil',
        'gol_ruang',
        'jabatan',
        'id_nego',
    ];
}
