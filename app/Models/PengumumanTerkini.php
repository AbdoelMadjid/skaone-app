<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanTerkini extends Model
{
    use HasFactory;
    protected $table = 'pengumuman_terkini';
    protected $fillable = [
        'judul_id',
        'urutan',
        'judul',
    ];

    public function poin()
    {
        return $this->hasMany(PengumumanPoin::class, 'pengumuman_id');
    }
    public function judulPengumuman()
    {
        return $this->belongsTo(PengumumanJudul::class, 'judul_id');
    }
}
