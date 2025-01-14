<?php

namespace App\Models\Kurikulum\PerangkatKurikulum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';
    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
    ];
}
