<?php

namespace App\Models\Pkl\PesertaDidikPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiSiswaPkl extends Model
{
    use HasFactory;
    protected $table = 'absensi_siswa_pkls';
    protected $fillable = [
        'nis',
        'tanggal',
        'status',
    ];
}
