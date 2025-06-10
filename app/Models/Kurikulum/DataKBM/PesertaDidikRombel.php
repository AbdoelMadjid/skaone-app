<?php

namespace App\Models\Kurikulum\DataKBM;

use App\Models\ManajemenSekolah\PesertaDidik;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidikRombel extends Model
{
    use HasFactory;

    protected $table = 'peserta_didik_rombels'; // Specify the table name if it's not pluralized correctly
    protected $fillable = [
        'tahun_ajaran',
        'kode_kk',
        'rombel_tingkat',
        'rombel_kode',
        'rombel_nama',
        'nis',
    ];

    public function pesertaDidik()
    {
        return $this->belongsTo(PesertaDidik::class, 'nis', 'nis');
    }
}
