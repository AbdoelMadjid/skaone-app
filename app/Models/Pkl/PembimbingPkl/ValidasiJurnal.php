<?php

namespace App\Models\Pkl\PembimbingPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidasiJurnal extends Model
{
    use HasFactory;
    protected $table = 'jurnal_pkls';
    protected $fillable = [
        'id_penempatan',
        'tanggal_kirim',
        'element',
        'id_tp',
        'keterangan',
        'gambar',
        'validasi',
        'komentar'
    ];
}
