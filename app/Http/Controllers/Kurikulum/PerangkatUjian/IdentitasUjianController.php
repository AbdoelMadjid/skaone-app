<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\UjianIdentitasDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatUjian\UjianIdentitasRequest;
use App\Models\Kurikulum\PerangkatUjian\UjianIdentitas;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class IdentitasUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UjianIdentitasDataTable $ujianIdentitasDataTable)
    {
        return $ujianIdentitasDataTable->render('pages.kurikulum.perangkatujian.identitas-ujian');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return view('pages.kurikulum.perangkatujian.identitas-ujian-form', [
            'data' => new UjianIdentitas(),
            'action' => route('kurikulum.perangkatujian.identitas-ujian.store'),
            'tahunAjaranOptions' => $tahunAjaranOptions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UjianIdentitasRequest $request)
    {
        $ujianIdentitas = new UjianIdentitas($request->validated());
        $ujianIdentitas->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(UjianIdentitas $ujianIdentitas)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return view('pages.kurikulum.perangkatujian.identitas-ujian-form', [
            'data' => $ujianIdentitas,
            'tahunAjaranOptions' => $tahunAjaranOptions
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UjianIdentitas $ujianIdentitas)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return view('pages.kurikulum.perangkatujian.identitas-ujian-form', [
            'data' => $ujianIdentitas,
            'action' => route('kurikulum.perangkatujian.identitas-ujian.update', $ujianIdentitas->id),
            'tahunAjaranOptions' => $tahunAjaranOptions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UjianIdentitasRequest $request, UjianIdentitas $ujianIdentitas)
    {
        $ujianIdentitas->fill($request->validated());
        $ujianIdentitas->save();

        return responseSuccess();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UjianIdentitas $ujianIdentitas)
    {
        $ujianIdentitas->delete();

        return responseSuccessDelete();
    }
}
