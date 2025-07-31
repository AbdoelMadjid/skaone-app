<?php

namespace App\Http\Controllers\Prakerin\Panitia;

use App\DataTables\Prakerin\Panitia\PrakerinIdentitasDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prakerin\Panitia\PrakerinIdentitasRequest;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\Prakerin\Panitia\PrakerinIdentitas;
use Illuminate\Http\Request;

class PrakerinIdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrakerinIdentitasDataTable $prakerinIdentitasDataTable)
    {
        return $prakerinIdentitasDataTable->render('pages.prakerin.panitia.administrasi-identitas-prakerin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return view('pages.prakerin.panitia.administrasi-identitas-prakerin-form', [
            'data' => new PrakerinIdentitas(),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'action' => route('panitiaprakerin.administrasi.identitas-prakerin.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrakerinIdentitasRequest $request)
    {
        $identitasPrakerin = new PrakerinIdentitas($request->validated());
        $identitasPrakerin->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PrakerinIdentitas $identitasPrakerin)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return view('pages.prakerin.panitia.administrasi-identitas-prakerin-form', [
            'data' => $identitasPrakerin,
            'tahunAjaranOptions' => $tahunAjaranOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrakerinIdentitas $identitasPrakerin)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return view('pages.prakerin.panitia.administrasi-identitas-prakerin-form', [
            'data' => $identitasPrakerin,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'action' => route('panitiaprakerin.administrasi.identitas-prakerin.update', $identitasPrakerin->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrakerinIdentitasRequest $request, PrakerinIdentitas $identitasPrakerin)
    {
        $identitasPrakerin->fill($request->validated());
        $identitasPrakerin->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrakerinIdentitas $identitasPrakerin)
    {
        $identitasPrakerin->delete();

        return responseSuccessDelete();
    }
}
