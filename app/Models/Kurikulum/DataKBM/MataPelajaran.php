<?php

namespace App\Models\Kurikulum\DataKBM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajarans';
    protected $fillable = [
        'kelompok',
        'kode',
        'nourut',
        'kel_mapel',
        'mata_pelajaran',
        'inisial_mp',
        'semester_1',
        'semester_2',
        'semester_3',
        'semester_4',
        'semester_5',
        'semester_6',
    ];

    public function mataPelajarPerJurusan()
    {
        return $this->hasMany(MataPelajaranPerJurusan::class, 'kel_mapel', 'kel_mapel');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($mataPelajaran) {
            // Hapus semua data di tabel mata_pelajar_per_jurusans terkait dengan mata pelajaran ini
            $mataPelajaran->mataPelajarPerJurusan()->delete();
        });
    }
}
