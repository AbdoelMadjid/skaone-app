<?php

namespace App\Http\Controllers\PembimbingPkl;

use App\DataTables\PembimbingPkl\AbsensiBimbinganDataTable;
use App\Models\PembimbingPkl\AbsensiPembimbingPkl;
use App\Http\Controllers\Controller;
use App\Http\Requests\PembimbingPkl\AbsensiPembimbingPklRequest;
use App\Models\PesertaDidikPkl\AbsensiSiswaPkl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsensiPembimbingPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AbsensiBimbinganDataTable $absensiBimbinganDataTable)
    {
        return $absensiBimbinganDataTable->render("pages.pembimbingpkl.absensi-bimbingan");
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

        return view('pages.pembimbingpkl.absensi-bimbingan-form', [
            'data' => new AbsensiSiswaPkl(),
            'siswaterbimbingOptions' => $siswaterbimbingOptions,
            'action' => route('pembimbingpkl.absensi-bimbingan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AbsensiPembimbingPklRequest $request)
    {
        $absensiPembimbingPkl = new AbsensiSiswaPkl($request->validated());
        $absensiPembimbingPkl->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AbsensiPembimbingPklRequest $request, AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }
}
