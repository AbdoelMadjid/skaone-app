<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    use HasFactory;
    protected $table = 'kepala_sekolahs';
    protected $fillable = [
        'nama',
        'nip',
        'tahunajaran',
        'ta_awal',
        'ta_akhir',
        'semester'

    ];
}
