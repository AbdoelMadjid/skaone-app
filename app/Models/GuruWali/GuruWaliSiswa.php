<?php

namespace App\Models\GuruWali;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruWaliSiswa extends Model
{
    use HasFactory;
    protected $table = 'guru_wali_siswas';

    protected $fillable = [
        'tahunajaran',
        'id_personil',
        'nis',
        'status'
    ];
}
