<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoJurusan extends Model
{
    use HasFactory;
    protected $table = 'photo_jurusans';
    protected $fillable = ['kode_kk', 'image'];
}
