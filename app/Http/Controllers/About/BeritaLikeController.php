<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\About\Berita;
use Illuminate\Http\Request;

class BeritaLikeController extends Controller
{
    public function store(Berita $berita)
    {
        $berita->likes()->create();
        return back()->with('success', 'Anda menyukai berita ini.');
    }
}
