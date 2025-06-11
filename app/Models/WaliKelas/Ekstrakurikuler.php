<?php

namespace App\Models\WaliKelas;

use App\Models\ManajemenSekolah\PesertaDidik;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;
    protected $table = 'ekstrakurikulers';
    protected $fillable = [
        'kode_rombel',
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'nis',
        'wajib',
        'wajib_n',
        'wajib_desk',
        'pilihan1',
        'pilihan1_n',
        'pilihan1_desk',
        'pilihan2',
        'pilihan2_n',
        'pilihan2_desk',
        'pilihan3',
        'pilihan3_n',
        'pilihan3_desk',
        'pilihan4',
        'pilihan4_n',
        'pilihan4_desk',
    ];

    public function pesertaDidik()
    {
        return $this->belongsTo(PesertaDidik::class, 'nis', 'nis');
    }
}
