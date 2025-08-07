<?php

namespace App\Models\Kurikulum\DataKBM;

use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMingguan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahunajaran',
        'semester',
        'kode_kk',
        'tingkat',
        'kode_rombel',
        'id_personil',
        'mata_pelajaran',
        'hari',
        'jam_ke',
    ];

    public function personil()
    {
        return $this->belongsTo(PersonilSekolah::class, 'id_personil', 'id_personil');
    }

    public function rombonganBelajar()
    {
        return $this->belongsTo(RombonganBelajar::class, 'kode_rombel', 'kode_rombel');
    }

    public function kehadiranJam()
    {
        return $this->hasMany(KehadiranGuruHarian::class);
    }
}
