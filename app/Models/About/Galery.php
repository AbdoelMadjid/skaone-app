<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;
    protected $table = 'galeries';
    protected $fillable = ['image', 'title', 'author', 'category', 'likes', 'comments'];
}
