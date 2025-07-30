<?php

namespace App\Models\Kurikulum\DataKBM;

use App\Models\GuruMapel\MateriAjar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbmPerRombel extends Model
{
    use HasFactory;
    protected $table = 'kbm_per_rombels';
    protected $fillable = [
        'kode_mapel_rombel',
        'tahunajaran',
        'kode_kk',
        'tingkat',
        'ganjilgenap',
        'semester',
        'kode_rombel',
        'rombel',
        'kel_mapel',
        'kode_mapel',
        'mata_pelajaran',
        'kkm',
        'id_personil',
    ];

    public function jamMengajar()
    {
        return $this->hasOne(JamMengajar::class, 'kbm_per_rombel_id');
    }

    // Relasi ke CapaianPembelajaran
    public function capaianPembelajarans()
    {
        return $this->hasMany(CapaianPembelajaran::class, 'inisial_mp', 'kel_mapel');
    }
}
