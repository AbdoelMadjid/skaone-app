<?php

namespace App\Models\Kurikulum\PerangkatKurikulum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VersiKurikulum extends Model
{
    use HasFactory;
    protected $table = 'versi_kurikulums';
    protected $fillable = [
        'nama',
        'nomor',
        'tentang',
    ];
}
