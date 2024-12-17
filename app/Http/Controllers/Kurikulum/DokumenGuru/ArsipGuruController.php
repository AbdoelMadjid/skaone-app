<?php

namespace App\Http\Controllers\Kurikulum\DokumenGuru;

use App\DataTables\Kurikulum\DokumenGuru\ArsipNgajarDataTable;
use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArsipNgajarDataTable $arsipNgajarDataTable)
    {
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return $arsipNgajarDataTable->render('pages.kurikulum.dokumenguru.arsip-guru', [
            'tahunAjaran' => $tahunAjaran,
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

    public function getGuru()
    {
        $guru = PersonilSekolah::where('jenispersonil', 'guru')
            ->where('aktif', 'Aktif')
            ->get(['id_personil', 'gelardepan', 'namalengkap', 'gelarbelakang']);

        return response()->json($guru);
    }

    public function getRombel()
    {
        $rombels = DB::table('rombongan_belajars')
            ->join('kompetensi_keahlians', 'rombongan_belajars.id_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('rombongan_belajars.kode_rombel', 'rombongan_belajars.rombel', 'rombongan_belajars.id_kk', 'kompetensi_keahlians.nama_kk')
            ->orderBy('kompetensi_keahlians.nama_kk') // Urutkan berdasarkan nama kompetensi keahlian
            ->orderBy('rombongan_belajars.rombel')   // Urutkan berdasarkan rombel di dalam kelompok
            ->get()
            ->groupBy('id_kk');

        return response()->json($rombels);
    }
}
