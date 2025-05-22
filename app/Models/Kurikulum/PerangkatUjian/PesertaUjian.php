<?php

namespace App\Models\Kurikulum\PerangkatUjian;

use App\Models\ManajemenSekolah\PesertaDidik;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaUjian extends Model
{
    use HasFactory;
    protected $table = 'peserta_ujians';
    protected $fillable = [
        'kode_ujian',
        'nis',
        'kelas',
        'nomor_peserta',
        'nomor_ruang',
        'kode_posisi_kelas',
        'posisi_duduk',
    ];

    public function pesertaDidik()
    {
        return $this->belongsTo(PesertaDidik::class, 'nis', 'nis');
    }
}
