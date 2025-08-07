<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RombonganBelajar extends Model
{
    use HasFactory;
    protected $table = 'rombongan_belajars';

    protected $fillable = [
        'tahunajaran',
        'id_kk',
        'tingkat',
        'singkatan_kk',
        'pararel',
        'rombel',
        'kode_rombel',
        'wali_kelas'
    ];

    public function walikelasSimpan()
    {
        return $this->hasMany(WaliKelas::class, 'kode_rombel', 'kode_rombel');
    }

    public function waliKelas()
    {
        return $this->belongsTo(PersonilSekolah::class, 'wali_kelas', 'id_personil');
    }

    // Event untuk menyimpan data di tabel wali_kelas
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($rombonganBelajar) {
            // Menyimpan atau memperbarui data di tabel wali_kelas
            \App\Models\ManajemenSekolah\WaliKelas::updateOrCreate(
                [
                    'tahunajaran' => $rombonganBelajar->tahunajaran,
                    'rombel' => $rombonganBelajar->rombel,
                    'kode_rombel' => $rombonganBelajar->kode_rombel,
                ],
                [
                    'wali_kelas' => $rombonganBelajar->wali_kelas
                ]
            );
        });

        static::deleting(function ($rombonganBelajar) {
            // Hapus semua data di tabel mata_pelajar_per_jurusans terkait dengan mata pelajaran ini
            $rombonganBelajar->walikelasSimpan()->delete();
        });
    }

    // Model RombonganBelajar
    public function kompetensiKeahlian()
    {
        return $this->belongsTo(KompetensiKeahlian::class, 'id_kk', 'idkk');
    }
}
