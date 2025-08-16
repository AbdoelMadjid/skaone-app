<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoJurusan extends Model
{
    use HasFactory;
    protected $table = 'logo_jurusans';
    protected $fillable = ['kode_kk', 'logo'];
}
