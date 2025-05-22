<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\JadwalUjianDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\MataPelajaranPerJurusan;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\JadwalUjian;
use Illuminate\Http\Request;

class JadwalUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JadwalUjianDataTable $jadwalUjianDataTable)
    {
        return $jadwalUjianDataTable->render('pages.kurikulum.perangkatujian.adminujian.crud-jadwal-ujian');
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
    public function show(JadwalUjian $jadwalUjian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalUjian $jadwalUjian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalUjian $jadwalUjian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalUjian $jadwalUjian)
    {
        //
    }

    public function generateFormJadwal(Request $request)
    {
        $tingkat = $request->tingkat;
        $kode_kk = $request->kode_kk;
        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();

        if (!$ujianAktif) {
            return response()->json('<div class="alert alert-warning">Ujian aktif tidak ditemukan.</div>');
        }

        $mataPelajaran = MataPelajaranPerJurusan::where('kode_kk', $kode_kk)->get();

        $start = \Carbon\Carbon::parse($ujianAktif->tgl_ujian_awal);
        $end = \Carbon\Carbon::parse($ujianAktif->tgl_ujian_akhir);

        $dates = [];
        for ($date = $start; $date->lte($end); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        return view('kurikulum.perangkatujian._form_massal_partial', compact(
            'tingkat',
            'kode_kk',
            'mataPelajaran',
            'dates',
            'ujianAktif'
        ));
    }
}
