<?php

namespace App\Models\WaliKelas;

use App\Models\ManajemenSekolah\PesertaDidik;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanWaliKelas extends Model
{
    use HasFactory;
    protected $table = 'catatan_wali_kelas';
    protected $fillable = [
        'kode_rombel',
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'nis',
        'catatan',
    ];

    public function pesertaDidik()
    {
        return $this->belongsTo(PesertaDidik::class, 'nis', 'nis');
    }
}
