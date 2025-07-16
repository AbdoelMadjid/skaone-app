<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidikOrtu extends Model
{
    use HasFactory;
    // Nama tabel
    protected $table = 'peserta_didik_ortus';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nis',
        'status_ortu',
        'nm_ayah',
        'nm_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'ortu_alamat_blok',
        'ortu_alamat_norumah',
        'ortu_alamat_rt',
        'ortu_alamat_rw',
        'ortu_alamat_desa',
        'ortu_alamat_kec',
        'ortu_alamat_kab',
        'ortu_alamat_kodepos',
        'ortu_kontak_telepon',
        'ortu_kontak_email',
    ];

    // Relasi ke PesertaDidik
    public function pesertaDidik()
    {
        return $this->belongsTo(PesertaDidik::class, 'nis', 'nis');
    }
}
