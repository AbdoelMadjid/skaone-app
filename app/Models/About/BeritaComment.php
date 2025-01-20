<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaComment extends Model
{
    use HasFactory;
    protected $table = 'berita_comments';
    protected $fillable = ['beritas_id', 'parent_id', 'content'];

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'beritas_id');
    }

    public function parent()
    {
        return $this->belongsTo(BeritaComment::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(BeritaComment::class, 'parent_id');
    }
}
