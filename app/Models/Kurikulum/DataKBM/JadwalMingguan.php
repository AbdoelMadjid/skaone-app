<?php

namespace App\Models\Kurikulum\DataKBM;

use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMingguan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_rombel',
        'tahunajaran',
        'semester',
        'id_personil',
        'mata_pelajaran',
        'hari',
        'jam_ke',
        'waktu_mulai',
        'waktu_selesai'
    ];

    protected $casts = [
        'jam_ke' => 'array',
    ];

    public function guru()
    {
        return $this->belongsTo(PersonilSekolah::class, 'id_personil');
    }
}
