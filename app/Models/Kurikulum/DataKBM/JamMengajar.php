<?php

namespace App\Models\Kurikulum\DataKBM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamMengajar extends Model
{
    use HasFactory;
    protected $table = 'jam_mengajars';

    protected $fillable = ['kbm_per_rombel_id', 'jumlah_jam'];

    public function kbm()
    {
        return $this->belongsTo(KbmPerRombel::class, 'kbm_per_rombel_id');
    }
}
