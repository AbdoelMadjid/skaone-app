<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanPoin extends Model
{
    use HasFactory;
    protected $table = 'pengumuman_poin';
    protected $fillable = [
        'pengumuman_id',
        'isi',
    ];

    public function pengumuman()
    {
        return $this->belongsTo(PengumumanTerkini::class, 'pengumuman_id');
    }
}
