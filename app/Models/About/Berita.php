<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';
    protected $fillable = ['title', 'content', 'image', 'published_at'];

    public function comments()
    {
        return $this->hasMany(BeritaComment::class, 'beritas_id');
    }

    public function likes()
    {
        return $this->hasMany(BeritaLike::class, 'beritas_id');
    }
}
