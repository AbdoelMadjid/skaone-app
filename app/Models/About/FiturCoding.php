<?php

namespace App\Models\About;

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
