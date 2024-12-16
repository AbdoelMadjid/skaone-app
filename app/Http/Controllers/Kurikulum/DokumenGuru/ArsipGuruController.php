<?php

namespace App\Http\Controllers\Kurikulum\DokumenGuru;

use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Http\Request;

class ArsipGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PersonilOptions = PersonilSekolah::get()
            ->filter(function ($item) {
                // Filter out items without 'id_personil' or other fields
                return isset($item->id_personil);
            })
            ->mapWithKeys(function ($item) {
                return [
                    $item->id_personil => [
                        'gelarbelakang' => $item->gelarbelakang ?? '',
                        'gelardepan' => $item->gelardepan ?? '',
                        'nip' => $item->nip ?? '',
                        'namalengkap' => $item->namalengkap ?? 'Nama Tidak Diketahui', // Tambahkan properti jika perlu
                    ],
                ];
            })
            ->toArray();


        return view('pages.kurikulum.dokumenguru.arsip-guru', compact('PersonilOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
