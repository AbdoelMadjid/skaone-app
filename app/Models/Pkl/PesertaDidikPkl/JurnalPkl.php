<?php

namespace App\Models\Pkl\PesertaDidikPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalPkl extends Model
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
        'komentar',
    ];
}
