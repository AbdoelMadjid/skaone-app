<?php

namespace App\Models\WaliKelas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitiMangsa extends Model
{
    use HasFactory;
    protected $table = 'titi_mangsas';
    protected $fillable = [
        'kode_rombel',
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'alamat',
        'titimangsa'
    ];
}
