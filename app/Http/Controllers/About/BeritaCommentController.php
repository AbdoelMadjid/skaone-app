<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\About\Berita;
use Illuminate\Http\Request;

class BeritaCommentController extends Controller
{
    public function store(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:berita_comments,id',
        ]);

        $berita->comments()->create($validated);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
