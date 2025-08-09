<?php

namespace App\Models\Pkl\PembimbingPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringPrakerin extends Model
{
    use HasFactory;
    protected $table = 'monitoring_prakerins';
    protected $fillable = [
        'id_perusahaan',
        'id_personil',
        'tgl_monitoring',
        'catatan_monitoring',
    ];
}
