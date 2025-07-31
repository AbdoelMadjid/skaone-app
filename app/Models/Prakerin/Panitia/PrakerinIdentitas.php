<?php

namespace App\Models\Prakerin\Panitia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrakerinIdentitas extends Model
{
    use HasFactory;
    protected $table = 'prakerin_identitas';
    protected $fillable = [
        'nama',
        'tahunajaran',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];
}
