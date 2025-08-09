<?php

namespace App\Http\Controllers\Pkl\PesertaDidikPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\PesertaDidikPkl\PesanPesertaPrakerinDataTable;
use App\Http\Requests\Pkl\PesertaDidikPkl\PesanSiswaRequest;
use App\Models\Pkl\PembimbingPkl\PesanPrakerin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesanPrakerinSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PesanPesertaPrakerinDataTable $pesanPesertaPrakerinDataTable)
    {
        // Ambil pesan untuk user yang login
        $userId = auth()->user()->nis;

        $pesanMasuk = PesanPrakerin::where('receiver_id', $userId)->latest()->get();
        $pesanKeluar = PesanPrakerin::where('sender_id', $userId)->latest()->get();

        return $pesanPesertaPrakerinDataTable->render("pages.pkl.pesertadidikpkl.pesan-siswa", compact('pesanMasuk', 'pesanKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nis = Auth::user()->nis;
        // Query untuk mendapatkan data siswa terbimbing
        // Query untuk mendapatkan data siswa terbimbing
        $pembimbingSiswa = DB::table('pembimbing_prakerins')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'personil_sekolahs.id_personil as id', // ID siswa sebagai value
                DB::raw("CONCAT(personil_sekolahs.id_personil, ' - ', personil_sekolahs.namalengkap) as name") // Nama siswa dan rombel
            )
            ->where('penempatan_prakerins.nis', $nis)
            ->first();

        return view('pages.pkl.pesertadidikpkl.pesan-siswa-form', [
            'data' => new PesanPrakerin(),
            'pembimbingSiswa' => $pembimbingSiswa,
            'action' => route('pesertadidikpkl.pesan-prakerin.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PesanSiswaRequest $request)
    {
        $pesanPrakerin = new PesanPrakerin($request->validated());
        $pesanPrakerin->save();

        return responseSuccess();
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
