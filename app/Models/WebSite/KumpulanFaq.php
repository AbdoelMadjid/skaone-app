<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KumpulanFaq extends Model
{
    use HasFactory;
    protected $table = 'kumpulan_faqs';
    protected $fillable = [
        'kategori',
        'pertanyaan',
        'jawaban',
    ];
}
