<?php

namespace App\Models\Prakerin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrakerinPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'prakerin_perusahaans';
    protected $fillable = [
        'nama',
        'alamat',
        'status',
    ];
}
