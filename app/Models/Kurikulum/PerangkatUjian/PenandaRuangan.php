<?php

namespace App\Models\Kurikulum\PerangkatUjian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenandaRuangan extends Model
{
    use HasFactory;
    protected $fillable = ['kode_ruang', 'label', 'x', 'y'];
}
