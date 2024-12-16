<?php

namespace App\Http\Controllers\Kurikulum\DokumenGuru;

use App\DataTables\Kurikulum\DokumenGuru\NgajarPerGuruDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NgajarPerGuruDataTable $ngajarPerGuruDataTable)
    {
        // Ambil data dari database
        $dataKelas = DB::table('rombongan_belajars')
            ->join('kompetensi_keahlians', 'rombongan_belajars.id_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('rombongan_belajars.rombel', 'kompetensi_keahlians.nama_kk')
            ->get()
            ->groupBy('nama_kk'); // Kelompokkan berdasarkan nama_kk

        return $ngajarPerGuruDataTable->render('pages.kurikulum.dokumenguru.per-guru', [
            'dataKelas' => $dataKelas,
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
