<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\PesertaUjian;
use App\Models\Kurikulum\PerangkatUjian\RuangUjian;
use Illuminate\Http\Request;

class AdministrasiUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first(); // Ambil 1 data aktif

        $ruangs = RuangUjian::select('nomor_ruang')->distinct()->pluck('nomor_ruang');

        return view('pages.kurikulum.perangkatujian.administrasi-ujian', [
            'identitasUjian' => $identitasUjian,
            'ruangs' => $ruangs,
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

    public function getDenahData(Request $request)
    {
        $request->validate([
            'nomor_ruang' => 'required',
            'layout' => 'required|in:4x5,5x4',
        ]);

        $data = PesertaUjian::where('nomor_ruang', $request->nomor_ruang)->get();

        // Bagi berdasarkan posisi_duduk dan reset index (agar bisa diakses via indeks)
        $kiri = $data->where('posisi_duduk', 'kiri')->values();
        $kanan = $data->where('posisi_duduk', 'kanan')->values();

        // Maksimum jumlah meja (selalu 20 untuk 4x5 atau 5x4)
        $totalMeja = 20;

        $mejaList = [];
        for ($i = 0; $i < $totalMeja; $i++) {
            $mejaList[] = [
                'kiri' => $kiri[$i] ?? null,
                'kanan' => $kanan[$i] ?? null,
            ];
        }

        return response()->json([
            'layout' => $request->layout,
            'mejaList' => $mejaList,
        ]);
    }
}
