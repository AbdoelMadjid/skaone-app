<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\PesertaDidik\IdentitasPesertaDidik;
use App\Models\PesertaDidik\KelulusanPesertaDidik;
use App\Models\PesertaDidik\TranskripDataSiswa;
use App\Models\PesertaDidik\TranskripMapel;
use App\Models\PesertaDidik\TranskripNilai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $aingPengguna = User::find(Auth::user()->id);

        $nis = $aingPengguna->nis;

        $dataRombel = PesertaDidikRombel::where('nis', $nis)->first();

        $kelulusan = KelulusanPesertaDidik::where('nis', $nis)->first();
        // Cek wali kelas
        if (!$kelulusan) {
            return redirect()->route('dashboard')->with('error', 'Maaf, Anda belum menyelesaikan proses pembelajaran selama 3 tahun. Tunggu waktunya ya.');
        }

        return view('pages.pesertadidik.kelulusan-peserta-didik', [
            'diff' => $diff,
            'dataRombel' => $dataRombel,
            'kelulusan' => $kelulusan,
        ]);

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
