<?php

namespace App\Models\PesertaDidik;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasPesertaDidik extends Model
{
    use HasFactory;
    // Nama tabel
    protected $table = 'peserta_didiks';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nis',
        'nisn',
        'thnajaran_masuk',
        'kode_kk',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_dalam_kel',
        'anak_ke',
        'sekolah_asal',
        'diterima_kelas',
        'diterima_tanggal',
        'asalsiswa',
        'keterangan_pindah',
        'alamat_blok',
        'alamat_norumah',
        'alamat_rt',
        'alamat_rw',
        'alamat_desa',
        'alamat_kec',
        'alamat_kab',
        'alamat_kodepos',
        'kontak_telepon',
        'kontak_email',
        'foto',
        'status',
        'alasan_status',
    ];
}
