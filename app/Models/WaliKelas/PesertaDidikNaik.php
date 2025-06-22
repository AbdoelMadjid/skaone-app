<?php

namespace App\Models\WaliKelas;

use App\Models\ManajemenSekolah\PesertaDidik;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidikNaik extends Model
{
    use HasFactory;
    protected $table = 'peserta_didik_naiks';
    protected $fillable = [
        'kode_rombel',
        'tahunajaran',
        'nis',
        'status',
    ];

    public function pesertaDidik()
    {
        return $this->belongsTo(PesertaDidik::class, 'nis', 'nis');
    }
}
