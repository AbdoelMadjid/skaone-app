<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaLike extends Model
{
    use HasFactory;
    protected $table = 'berita_likes';
    protected $fillable = ['beritas_id'];

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'beritas_id');
    }
}
