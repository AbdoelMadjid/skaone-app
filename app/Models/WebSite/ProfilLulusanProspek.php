<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilLulusanProspek extends Model
{
    use HasFactory;
    protected $table = 'profil_lulusan_prospeks';
    protected $fillable = [
        'id_kk',
        'tipe',
        'deskripsi',
    ];
}
