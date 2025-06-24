<?php

namespace App\Http\Controllers\GuruMapel;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArsipKbmGmapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;
        // Ambil data personil
        $personil = PersonilSekolah::where('id_personil', $personal_id)->first();
        $fullName = $personil
            ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') . $personil->namalengkap . ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
            : 'Unknown';

        // Ambil semua data untuk personil login
        $kbmList = KbmPerRombel::where('id_personil', $personal_id)->get();

        // Normalisasi ganjilgenap ke lowercase
        foreach ($kbmList as $item) {
            $item->ganjilgenap = strtolower($item->ganjilgenap);
        }

        // Kelompokkan secara bersarang: tahunajaran → ganjilgenap → tingkat
        $data = $kbmList->groupBy([
            'tahunajaran',
            function ($item) {
                return $item->ganjilgenap; // Sudah lowercase
            },
            'tingkat',
        ]);

        // Urutkan berdasarkan tingkat di dalam setiap tahunajaran → ganjilgenap
        $data = $data->map(function ($semesterGroup) {
            return $semesterGroup->map(function ($tingkatGroup) {
                // Urutkan tingkat (pastikan key-nya numerik, 10, 11, 12)
                return $tingkatGroup->sortKeys();
            });
        });

        return view('pages.gurumapel.arsip-kbm', compact('data', 'fullName'));
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
