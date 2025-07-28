<?php

namespace App\Models\Kurikulum\DataKBM;

use App\Models\ManajemenSekolah\PersonilSekolah;
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

    protected $casts = [
        'jam_ke' => 'array',
    ];
}
