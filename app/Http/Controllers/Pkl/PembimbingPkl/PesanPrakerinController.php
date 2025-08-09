<?php

namespace App\Http\Controllers\Pkl\PembimbingPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\PembimbingPkl\PesanPrakerinDataTable;
use App\Models\Pkl\PembimbingPkl\PesanPrakerin;
use App\Http\Requests\Pkl\PembimbingPkl\PesanPrakerinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesanPrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PesanPrakerinDataTable $pesanPrakerinDataTable)
    {
        // Ambil pesan untuk user yang login
        $userId = auth()->user()->personal_id;

        $pesanMasuk = PesanPrakerin::where('receiver_id', $userId)->latest()->get();
        $pesanKeluar = PesanPrakerin::where('sender_id', $userId)->latest()->get();

        return $pesanPrakerinDataTable->render("pages.pkl.pembimbingpkl.pesan-prakerin", compact('pesanMasuk', 'pesanKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_personil = Auth::user()->personal_id;
        // Query untuk mendapatkan data siswa terbimbing
        // Query untuk mendapatkan data siswa terbimbing
        $siswaterbimbingOptions = DB::table('pembimbing_prakerins')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'penempatan_prakerins.nis as id', // ID siswa sebagai value
                DB::raw("CONCAT(peserta_didik_rombels.rombel_nama, ' - ', peserta_didiks.nis, ' - ', peserta_didiks.nama_lengkap) as name") // Gabungkan NIS dan nama lengkap
            )
            ->where('pembimbing_prakerins.id_personil', $id_personil)
            ->get()
            ->pluck('name', 'id') // Pluck untuk membuat key-value array
            ->toArray();

        return view('pages.pkl.pembimbingpkl.pesan-prakerin-form', [
            'data' => new PesanPrakerin(),
            'siswaterbimbingOptions' => $siswaterbimbingOptions,
            'action' => route('pembimbingpkl.pesan-prakerin.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PesanPrakerinRequest $request)
    {
        $pesanPrakerin = new PesanPrakerin($request->validated());
        $pesanPrakerin->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PesanPrakerin $pesanPrakerin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesanPrakerin $pesanPrakerin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PesanPrakerinRequest $request, PesanPrakerin $pesanPrakerin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesanPrakerin $pesanPrakerin)
    {
        //
    }
}
