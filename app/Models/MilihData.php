<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilihData extends Model
{
    use HasFactory;
    protected $table = 'milih_data'; // Specify the table name if it's not pluralized correctly
    protected $fillable = [
        'id_personil',
        'tahunajaran',
        'semester',
        'kode_kk',
        'tingkat',
        'kode_rombel',
        'id_siswa',
        'id_guru',
    ];
}
