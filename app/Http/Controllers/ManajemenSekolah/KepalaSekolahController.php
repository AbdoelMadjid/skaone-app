<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\KepalaSekolahDataTable;
use App\Models\ManajemenSekolah\KepalaSekolah;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\KepalaSekolahRequest;
use App\Models\ManajemenSekolah\TahunAjaran;

class KepalaSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KepalaSekolahDataTable $kepalaSekolahDataTable)
    {
        return $kepalaSekolahDataTable->render('pages.manajemensekolah.jabatan.kepala-sekolah');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran'); // Mengambil nama_bk sebagai key dan idbk sebagai value
        return view('pages.manajemensekolah.jabatan.kepala-sekolah-form', [
            'data' => new KepalaSekolah(),
            'tahunAjaran' => $tahunAjaran,
            'action' => route('manajemensekolah.timmanajemen.kepala-sekolah.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KepalaSekolahRequest $request)
    {
        $kepalaSekolah = new KepalaSekolah($request->validated());
        $kepalaSekolah->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(KepalaSekolah $kepalaSekolah)
    {
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran');
        return view('pages.manajemensekolah.jabatan.kepala-sekolah-form', [
            'data' => $kepalaSekolah,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KepalaSekolah $kepalaSekolah)
    {
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran');
        return view('pages.manajemensekolah.jabatan.kepala-sekolah-form', [
            'data' => $kepalaSekolah,
            'tahunAjaran' => $tahunAjaran,
            'action' => route('manajemensekolah.timmanajemen.kepala-sekolah.update', $kepalaSekolah->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KepalaSekolahRequest $request, KepalaSekolah $kepalaSekolah)
    {
        $kepalaSekolah->fill($request->validated());
        $kepalaSekolah->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KepalaSekolah $kepalaSekolah)
    {
        $kepalaSekolah->delete();

        return responseSuccessDelete();
    }
}
