<?php

namespace App\Models\Kurikulum\DataKBM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunciDataKbm extends Model
{
    use HasFactory;
    protected $table = 'kunci_data_kbm'; // Specify the table name if it's not pluralized correctly
    protected $fillable = [
        'id_personil',
        'tahunajaran',
        'ganjilgenap',
        'semester',
        'kode_kk',
        'tingkat',
        'kode_rombel',
    ];
}
