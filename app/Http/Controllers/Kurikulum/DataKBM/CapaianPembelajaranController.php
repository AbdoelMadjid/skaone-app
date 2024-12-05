<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\CapaianPembelajaranDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
use App\Http\Requests\Kurikulum\DataKBM\CapaianPembelajaranRequest;
use App\Models\Kurikulum\DataKBM\MataPelajaran;

class CapaianPembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CapaianPembelajaranDataTable $capaianPembelajaranDataTable)
    {
        return $capaianPembelajaranDataTable->render('pages.kurikulum.datakbm.capaian-pembelajaran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nomorOptions = [];
        for ($i = 1; $i <= 10; $i++) {
            $nomorOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        $inisialMP = MataPelajaran::all()->mapWithKeys(function ($item) {
            return [$item->kel_mapel => $item->kel_mapel . ' - ' . $item->mata_pelajaran];
        })->toArray();

        return view('pages.kurikulum.datakbm.capaian-pembelajaran-form', [
            'data' => new CapaianPembelajaran(),
            'inisialMP' => $inisialMP,
            'nomorOptions' => $nomorOptions,
            'action' => route('kurikulum.datakbm.capaian-pembelajaran.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CapaianPembelajaranRequest $request)
    {
        // Ambil inisial yang dipilih
        $inisialMp = $request->input('inisial_mp');

        // Dapatkan nama mata pelajaran berdasarkan inisial
        $mataPelajaran = MataPelajaran::where('kel_mapel', $inisialMp)->first();

        if ($mataPelajaran) {
            // Buat objek CapaianPembelajaran dengan data yang sudah divalidasi
            $capaianPembelajaran = new CapaianPembelajaran($request->validated());

            // Set nama_matapelajaran dari mata pelajaran yang ditemukan
            $capaianPembelajaran->nama_matapelajaran = $mataPelajaran->mata_pelajaran;

            // Simpan ke dalam database
            $capaianPembelajaran->save();

            return responseSuccess();
        }

        return response()->json(['error' => 'Inisial MP tidak ditemukan.'], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(CapaianPembelajaran $capaianPembelajaran)
    {
        $nomorOptions = [];
        for ($i = 1; $i <= 10; $i++) {
            $nomorOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }
        $inisialMP = MataPelajaran::pluck('mata_pelajaran', 'kel_mapel')->toArray();

        return view('pages.kurikulum.datakbm.capaian-pembelajaran-form', [
            'data' => $capaianPembelajaran,
            'inisialMP' => $inisialMP,
            'nomorOptions' => $nomorOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CapaianPembelajaran $capaianPembelajaran)
    {
        $nomorOptions = [];
        for ($i = 1; $i <= 10; $i++) {
            $nomorOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }
        $inisialMP = MataPelajaran::pluck('mata_pelajaran', 'kel_mapel')->toArray();

        return view('pages.kurikulum.datakbm.capaian-pembelajaran-form', [
            'data' => $capaianPembelajaran,
            'inisialMP' => $inisialMP,
            'nomorOptions' => $nomorOptions,
            'action' => route('kurikulum.datakbm.capaian-pembelajaran.update', $capaianPembelajaran->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CapaianPembelajaranRequest $request, CapaianPembelajaran $capaianPembelajaran)
    {
        //$capaianPembelajaran = CapaianPembelajaran::findOrFail($id_cp);

        // Ambil inisial yang dipilih
        $inisialMp = $request->input('inisial_mp');

        // Dapatkan nama mata pelajaran berdasarkan inisial
        $mataPelajaran = MataPelajaran::where('kel_mapel', $inisialMp)->first();

        if ($mataPelajaran) {
            // Update objek CapaianPembelajaran dengan data yang sudah divalidasi
            $capaianPembelajaran->fill($request->validated());

            // Set nama_matapelajaran dari mata pelajaran yang ditemukan
            $capaianPembelajaran->nama_matapelajaran = $mataPelajaran->mata_pelajaran;

            // Simpan perubahan
            $capaianPembelajaran->save();

            return responseSuccess();
        }

        return response()->json(['error' => 'Inisial MP tidak ditemukan.'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CapaianPembelajaran $capaianPembelajaran)
    {
        $capaianPembelajaran->delete();

        return responseSuccessDelete();
    }
}
