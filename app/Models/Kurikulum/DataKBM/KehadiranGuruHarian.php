<?php

namespace App\Models\Kurikulum\DataKBM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranGuruHarian extends Model
{
    use HasFactory;
    protected $table = 'kehadiran_guru_harians';
    protected $fillable = [
        'jadwal_mingguan_id',
        'id_personil',
        'hari',
        'tanggal',
        'jam_ke',
    ];

    public function jadwalMingguan()
    {
        return $this->belongsTo(JadwalMingguan::class);
    }
}
