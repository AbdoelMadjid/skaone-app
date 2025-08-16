<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoPersonil extends Model
{
    use HasFactory;
    protected $table = 'photo_personils';
    protected $fillable = [
        'no_group',
        'nama_group',
        'no_personil',
        'id_personil',
        'photo',
    ];
}
