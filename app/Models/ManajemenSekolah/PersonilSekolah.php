<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonilSekolah extends Model
{
    use HasFactory;

    protected $table = 'personil_sekolahs'; // Nama tabel di database

    protected $fillable = [
        'id_personil',
        'nip',
        'gelardepan',
        'namalengkap',
        'gelarbelakang',
        'jeniskelamin',
        'jenispersonil',
        'tempatlahir',
        'tanggallahir',
        'agama',
        'kontak_email',
        'kontak_hp',
        'photo',
        'aktif',
        'alamat_blok',
        'alamat_nomor',
        'alamat_rt',
        'alamat_rw',
        'alamat_desa',
        'alamat_kec',
        'alamat_kab',
        'alamat_prov',
        'alamat_kodepos',
        'bg_profil',
        'motto_hidup',
    ];

    public static function boot()
    {
        parent::boot();

        // Set ID otomatis saat model dibuat
        static::creating(function ($model) {
            $lastRecord = static::orderBy('id_personil', 'desc')->first();
            $lastNumber = $lastRecord ? intval(substr($lastRecord->id_personil, 4)) : 0;
            $model->id_personil = 'Pgw_' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        });
    }
}
