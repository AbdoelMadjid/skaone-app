<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\RuangUjianDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatUjian\RuangUjianRequest;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\RuangUjian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use Illuminate\Http\Request;

class RuangUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RuangUjianDataTable $ruangUjianDataTable)
    {
        return $ruangUjianDataTable->render('pages.kurikulum.perangkatujian.adminujian.crud-ruang-ujian');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first(); // Ambil 1 data aktif

        $kelasOptions = [];
        if ($identitasUjian) {
            $rombels = RombonganBelajar::where('tahunajaran', $identitasUjian->tahun_ajaran)->get();

            $kelasOptions = $rombels->pluck('rombel', 'kode_rombel')->toArray();
            // Hasil: ['X IPA 1' => 'RMBL001', 'X IPA 2' => 'RMBL002']
        }

        $ruanganOptions = [];
        for ($i = 1; $i <= 50; $i++) {
            $ruanganOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        return view('pages.kurikulum.perangkatujian.adminujian.crud-ruang-ujian-form', [
            'data' => new RuangUjian(),
            'action' => route('kurikulum.perangkatujian.administrasi-ujian.ruang-ujian.store'),
            'identitasUjian' => $identitasUjian,
            'ruanganOptions' => $ruanganOptions,
            'kelasOptions' => $kelasOptions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuangUjianRequest $request)
    {
        $ruangUjian = new RuangUjian($request->validated());
        $ruangUjian->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(RuangUjian $ruangUjian)
    {
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first(); // Ambil 1 data aktif

        $kelasOptions = [];
        if ($identitasUjian) {
            $rombels = RombonganBelajar::where('tahunajaran', $identitasUjian->tahun_ajaran)->get();

            $kelasOptions = $rombels->pluck('rombel', 'kode_rombel')->toArray();
            // Hasil: ['X IPA 1' => 'RMBL001', 'X IPA 2' => 'RMBL002']
        }

        $ruanganOptions = [];
        for ($i = 1; $i <= 50; $i++) {
            $ruanganOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        return view('pages.kurikulum.perangkatujian.adminujian.crud-ruang-ujian-form', [
            'data' => $ruangUjian,
            'identitasUjian' => $identitasUjian,
            'ruanganOptions' => $ruanganOptions,
            'kelasOptions' => $kelasOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RuangUjian $ruangUjian)
    {
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first(); // Ambil 1 data aktif

        $kelasOptions = [];
        if ($identitasUjian) {
            $rombels = RombonganBelajar::where('tahunajaran', $identitasUjian->tahun_ajaran)->get();

            $kelasOptions = $rombels->pluck('rombel', 'kode_rombel')->toArray();
            // Hasil: ['X IPA 1' => 'RMBL001', 'X IPA 2' => 'RMBL002']
        }

        $ruanganOptions = [];
        for ($i = 1; $i <= 50; $i++) {
            $ruanganOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        return view('pages.kurikulum.perangkatujian.adminujian.crud-ruang-ujian-form', [
            'data' => $ruangUjian,
            'action' => route('kurikulum.perangkatujian.administrasi-ujian.ruang-ujian.update', $ruangUjian->id),
            'identitasUjian' => $identitasUjian,
            'ruanganOptions' => $ruanganOptions,
            'kelasOptions' => $kelasOptions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RuangUjianRequest $request, RuangUjian $ruangUjian)
    {
        $ruangUjian->fill($request->validated());
        $ruangUjian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RuangUjian $ruangUjian)
    {
        $ruangUjian->delete();

        return responseSuccessDelete();
    }
}
