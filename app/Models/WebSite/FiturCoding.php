<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiturCoding extends Model
{
    use HasFactory;
    protected $table = 'fitur_codings';
    protected $fillable = [
        'judul',
        'deskripsi',
        'contoh',
    ];
}
