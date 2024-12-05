<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoSlide extends Model
{
    use HasFactory;
    protected $table = 'photo_slides';
    protected $fillable = ['gambar', 'alt_text', 'interval', 'is_active'];
}
