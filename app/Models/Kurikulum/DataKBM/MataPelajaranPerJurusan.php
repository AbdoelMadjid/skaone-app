<?php

namespace App\Models\Kurikulum\DataKBM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaranPerJurusan extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajaran_per_jurusans';
    protected $fillable = [
        'kode_kk',
        'kel_mapel',
        'kode_mapel',
        'mata_pelajaran',
        'semester_1',
        'semester_2',
        'semester_3',
        'semester_4',
        'semester_5',
        'semester_6',
    ];

    /**
     * Define the relationship to the MataPelajaran model.
     * Each MataPelajaranPerJurusan belongs to one MataPelajaran.
     */
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'kel_mapel', 'kel_mapel');
    }
}
