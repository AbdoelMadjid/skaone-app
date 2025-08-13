<?php

namespace App\Models\Kurikulum\DataKBM;

use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganTidakHadirGuru extends Model
{
    use HasFactory;
    protected $table = 'keterangan_tidak_hadir_guru';

    protected $fillable = [
        'id_personil',
        'hari',
        'tanggal',
        'keterangan',
    ];
}
