<?php

namespace App\Models\GuruMapel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatAjar extends Model
{
    use HasFactory;
    protected $table = 'perangkat_ajar';

    protected $fillable = [
        'id_personil',
        'tahunajaran',
        'semester',
        'tingkat',
        'mata_pelajaran',
        'doc_analis_waktu',
        'doc_cp',
        'doc_tp',
        'doc_rpp',
    ];
}
