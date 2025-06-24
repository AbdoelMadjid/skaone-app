<?php

namespace App\Models\Kurikulum\DokumenSiswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeklistCetakRapor extends Model
{
    use HasFactory;
    protected $table = 'ceklist_cetak_rapors';
    protected $fillable = [
        'tahunajaran',
        'ganjilgenap',
        'kode_rombel',
        'status',
    ];
}
