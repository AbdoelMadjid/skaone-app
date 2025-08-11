<?php

namespace App\Models\ManajemenSekolah\BpBk;

use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\PesertaDidik;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BpBkSiswaBermasalah extends Model
{
    use HasFactory;
    // Nama tabel
    protected $table = 'bp_bk_siswa_bermasalahs';

    // Kolom yang bisa diisi
    protected $fillable = [
        'tahunajaran',
        'semester',
        'tanggal',
        'nis',
        'rombel',
        'jenis_kasus',
    ];

    public function pesertaDidik()
    {
        return $this->belongsTo(PesertaDidik::class, 'nis', 'nis');
    }

    public function rombelSiswa()
    {
        return $this->belongsTo(PesertaDidikRombel::class, 'nis', 'nis')
            ->where(function ($query) {
                $query->whereColumn('peserta_didik_rombels.tahun_ajaran', 'bp_bk_siswa_bermasalahs.tahunajaran');
            });
    }
}
