<?php

namespace App\Models\PembimbingPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiPembimbingPkl extends Model
{
    use HasFactory;
    protected $table = 'absensi_pembimbing_pkls';
    protected $fillable = [
        'id_penempatan',
        'sakit',
        'izin',
        'alfa',
        'jmlhabsen',
    ];
}
