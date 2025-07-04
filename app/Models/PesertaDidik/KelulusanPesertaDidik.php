<?php

namespace App\Models\PesertaDidik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelulusanPesertaDidik extends Model
{
    use HasFactory;
    // Nama tabel
    protected $table = 'kelulusan';

    // Kolom yang bisa diisi
    protected $fillable = [
        'tahun_ajaran',
        'nis',
        'status_kelulusan',
        'no_ijazah',
    ];
}
