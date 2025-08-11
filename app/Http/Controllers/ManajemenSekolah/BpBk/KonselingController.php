<?php

namespace App\Http\Controllers\ManajemenSekolah\BpBk;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\BpBk\BpBkSiswaBermasalah;
use App\Models\User;
use Illuminate\Http\Request;

class KonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guruBpbk = User::role('bpbk')
            ->join('personil_sekolahs', 'users.personal_id', '=', 'personil_sekolahs.id_personil')
            ->select(
                'personil_sekolahs.photo',
                'personil_sekolahs.jeniskelamin',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',
                'personil_sekolahs.nip'
            )
            ->get()
            ->map(function ($row) {
                // Proses avatar di controller
                $row->avatar_tag = ImageHelper::getAvatarImageTag(
                    filename: $row->photo,
                    gender: $row->jeniskelamin,
                    folder: 'personil',
                    defaultMaleImage: 'gurulaki.png',
                    defaultFemaleImage: 'gurucewek.png',
                    width: 150,
                    class: 'rounded-circle avatar-sm'
                );
                return $row;
            });

        $siswaBermasalah = BpBkSiswaBermasalah::with('pesertaDidik')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('pages.manajemensekolah.bpbk.konseling', [
            'guruBpbk' => $guruBpbk,
            'siswaBermasalah' => $siswaBermasalah,
        ]);
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
