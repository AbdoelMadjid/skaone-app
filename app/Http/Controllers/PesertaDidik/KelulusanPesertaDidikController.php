<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KelulusanPesertaDidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tentukan tanggal mulai (2 Desember 2024) dan tanggal target (31 Maret 2025)
        $startDate = Carbon::create(2025, 5, 5, 16, 0, 0);
        $endDate = Carbon::create(2025, 5, 19, 16, 0, 0);

        // Ambil waktu sekarang
        $now = Carbon::now();

        // Cek jika waktu sekarang sudah melewati tanggal mulai
        if ($now->lessThan($startDate)) {
            $diff = $startDate->diff($now);  // Waktu yang tersisa sampai 2 Desember 2024
        } else {
            // Hitung selisih waktu dari sekarang sampai tanggal target
            $diff = $now->diff($endDate);
        }

        return view('pages.pesertadidik.kelulusan-peserta-didik', compact(
            'diff',
        ));

        //return view('pages.pesertadidik.kelulusan-peserta-didik');
    }
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
