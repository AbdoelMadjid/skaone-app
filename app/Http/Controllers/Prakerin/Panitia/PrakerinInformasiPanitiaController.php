<?php

namespace App\Http\Controllers\Prakerin\Panitia;

use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\Prakerin\Kaprog\PrakerinPenempatan;
use App\Models\Prakerin\Panitia\PrakerinPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrakerinInformasiPanitiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mulai query dasar
        /* $query = DB::table('prakerin_penempatans')
            ->select(
                'prakerin_penempatans.tahunajaran',
                'prakerin_penempatans.kode_kk',
                'kompetensi_keahlians.nama_kk',
                'program_keahlians.nama_pk', // ← ambil nama program keahlian
                'peserta_didiks.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama AS rombel',
                'prakerin_perusahaans.id AS id_perusahaan',
                'prakerin_perusahaans.nama AS nama_perusahaan',
                'prakerin_perusahaans.alamat AS alamat_perusahaan',
            )
            ->join('kompetensi_keahlians', 'prakerin_penempatans.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('program_keahlians', 'kompetensi_keahlians.id_pk', '=', 'program_keahlians.idpk')
            ->join('prakerin_perusahaans', 'prakerin_penempatans.id_dudi', '=', 'prakerin_perusahaans.id')
            ->join('peserta_didiks', 'prakerin_penempatans.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis'); */

        $data = DB::table('prakerin_perusahaans')
            ->select(
                'prakerin_perusahaans.id',
                'prakerin_perusahaans.nama AS nama_perusahaan',
                DB::raw('COUNT(prakerin_penempatans.nis) AS jumlah_siswa')
            )
            ->leftJoin('prakerin_penempatans', 'prakerin_perusahaans.id', '=', 'prakerin_penempatans.id_dudi')
            ->groupBy('prakerin_perusahaans.id', 'prakerin_perusahaans.nama')
            ->orderBy('prakerin_perusahaans.nama')
            ->get();

        // Hitung total perusahaan
        $totalPerusahaan = DB::table('prakerin_perusahaans')->count();

        return view('pages.prakerin.panitia.informasi', [
            'data' => $data,
            'totalPerusahaan' => $totalPerusahaan,
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

    public function getSiswaByPerusahaan($id)
    {
        // Ambil tahun ajaran aktif
        $activeTahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        if (!$activeTahunAjaran) {
            return response()->json(['error' => 'Tahun ajaran aktif tidak ditemukan'], 404);
        }

        $tahunAjaran = $activeTahunAjaran->tahunajaran;

        $siswa = DB::table('prakerin_penempatans')
            ->join('prakerin_pesertas', function ($join) use ($tahunAjaran) {
                $join->on('prakerin_penempatans.nis', '=', 'prakerin_pesertas.nis')
                    ->where('prakerin_pesertas.tahunajaran', '=', $tahunAjaran);
            })
            ->join('peserta_didiks', 'peserta_didiks.nis', '=', 'prakerin_pesertas.nis')
            ->join('peserta_didik_rombels', function ($join) use ($tahunAjaran) {
                $join->on('peserta_didik_rombels.nis', '=', 'prakerin_pesertas.nis')
                    ->where('peserta_didik_rombels.tahun_ajaran', '=', $tahunAjaran);
            })
            ->join('kompetensi_keahlians', 'kompetensi_keahlians.idkk', '=', 'prakerin_penempatans.kode_kk')
            ->where('prakerin_penempatans.id_dudi', $id)
            ->where('prakerin_penempatans.tahunajaran', $tahunAjaran)
            ->select(
                'prakerin_pesertas.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama as rombel',
                'kompetensi_keahlians.nama_kk as jurusan'
            )
            ->orderBy('peserta_didik_rombels.rombel_nama')
            ->orderBy('prakerin_pesertas.nis')
            ->get();

        return response()->json($siswa);
    }

    public function getPerusahaan($id)
    {
        $perusahaan = PrakerinPerusahaan::find($id);
        return response()->json($perusahaan);
    }
}
