<?php

namespace App\Http\Controllers\Kurikulum\DokumenGuru;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ArsipGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.kurikulum.dokumenguru.arsip-guru');
    }

    // Menangani request untuk mendapatkan data KBM dengan filter
    public function getKbmData(Request $request)
    {
        $filterType = $request->input('filterType');
        $gurumapel = $request->input('gurumapel');
        $rombel = $request->input('rombel');

        $query = DB::table('kbm_per_rombels')
            ->join('personil_sekolahs', 'kbm_per_rombels.id_personil', '=', 'personil_sekolahs.id_personil')
            ->select('kbm_per_rombels.*', 'personil_sekolahs.namalengkap');

        // Filter berdasarkan gurumapel atau rombel
        if ($filterType === 'gurumapel' && $gurumapel !== 'All') {
            $query->where('kbm_per_rombels.id_personil', $gurumapel);
        } elseif ($filterType === 'rombel' && $rombel !== 'All') {
            $query->where('kbm_per_rombels.kode_rombel', $rombel);
        }

        // Ambil data sesuai filter
        $data = $query->get();

        return response()->json($data);
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
