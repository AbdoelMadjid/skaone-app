<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanJudul extends Model
{
    use HasFactory;
    protected $table = 'pengumuman_judul';
    protected $fillable = [
        'judul',
        'status',
    ];

    public function pengumumanTerkiniAktif()
    {
        return $this->hasMany(PengumumanTerkini::class, 'judul_id');
    }
}
