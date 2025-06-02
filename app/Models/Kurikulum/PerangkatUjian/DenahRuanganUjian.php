<?php

namespace App\Models\Kurikulum\PerangkatUjian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenahRuanganUjian extends Model
{
    use HasFactory;
    protected $table = 'denah_ruangan_ujians';
    protected $primaryKey = 'id';
    protected $fillable = ['kode_ruang', 'label', 'x', 'y', 'warna'];
}
