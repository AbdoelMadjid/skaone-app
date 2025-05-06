<?php

namespace App\Models\PesertaDidik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranskripMapel extends Model
{
    use HasFactory;
    // Nama tabel
    protected $table = 'transkrip_mapel';

    /* // Kolom yang bisa diisi
    protected $fillable = [
        'tahun_ajaran',
        'nis',
        'nisn',
        'kelas',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'orangtua',
    ]; */
}
