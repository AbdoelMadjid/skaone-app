<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\IdentitasUjianDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatUjian\IdentitasUjianRequest;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\ManajemenSekolah\TahunAjaran;

class IdentitasUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IdentitasUjianDataTable $identitasUjianDataTable)
    {
        return $identitasUjianDataTable->render('pages.kurikulum.perangkatujian.identitas-ujian');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return view('pages.kurikulum.perangkatujian.identitas-ujian-form', [
            'data' => new IdentitasUjian(),
            'action' => route('kurikulum.perangkatujian.identitas-ujian.store'),
            'tahunAjaranOptions' => $tahunAjaranOptions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdentitasUjianRequest $request)
    {
        $ujianIdentitas = new IdentitasUjian($request->validated());
        $ujianIdentitas->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(IdentitasUjian $identitasUjian)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        return view('pages.kurikulum.perangkatujian.identitas-ujian-form', [
            'data' => $identitasUjian,
            'tahunAjaranOptions' => $tahunAjaranOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IdentitasUjian $identitasUjian)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        return view('pages.kurikulum.perangkatujian.identitas-ujian-form', [
            'data' => $identitasUjian,
            'action' => route('kurikulum.perangkatujian.identitas-ujian.update', $identitasUjian->id),
            'tahunAjaranOptions' => $tahunAjaranOptions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdentitasUjianRequest $request, IdentitasUjian $identitasUjian)
    {
        $identitasUjian->fill($request->validated());
        $identitasUjian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IdentitasUjian $identitasUjian)
    {
        $identitasUjian->delete();

        return responseSuccessDelete();
    }
}
