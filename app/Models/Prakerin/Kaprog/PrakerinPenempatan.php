<?php

namespace App\Models\Prakerin\Kaprog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrakerinPenempatan extends Model
{
    use HasFactory;
    protected $table = 'prakerin_penempatans';
    protected $fillable = ['tahunajaran', 'kode_kk', 'nis', 'id_dudi'];
}
