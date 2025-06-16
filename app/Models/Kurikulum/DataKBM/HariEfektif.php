<?php

namespace App\Models\Kurikulum\DataKBM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HariEfektif extends Model
{
    use HasFactory;
    protected $table = 'hari_efektif';
    protected $fillable = ['tahun_ajaran_id', 'semester', 'bulan', 'jumlah_hari_efektif'];
}
