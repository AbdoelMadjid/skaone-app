<?php

namespace App\Http\Controllers\Prakerin\Panitia;

use App\DataTables\Prakerin\Panitia\PrakerinPerusahaanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prakerin\Panitia\PrakerinPerusahaanRequest;
use App\Models\Prakerin\Panitia\PrakerinPerusahaan;
use Illuminate\Http\Request;

class PrakerinPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrakerinPerusahaanDataTable $perusahaanDataTable)
    {
        return $perusahaanDataTable->render('pages.prakerin.panitia.perusahaan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.prakerin.panitia.perusahaan-form', [
            'data' => new PrakerinPerusahaan(),
            'action' => route('panitiaprakerin.perusahaan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrakerinPerusahaanRequest $request)
    {
        $perusahaan = new PrakerinPerusahaan($request->validated());
        $perusahaan->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PrakerinPerusahaan $perusahaan)
    {
        return view('pages.prakerin.panitia.perusahaan-form', [
            'data' => $perusahaan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrakerinPerusahaan $perusahaan)
    {
        return view('pages.prakerin.panitia.perusahaan-form', [
            'data' => $perusahaan,
            'action' => route('panitiaprakerin.perusahaan.update', $perusahaan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrakerinPerusahaanRequest $request, PrakerinPerusahaan $perusahaan)
    {
        $perusahaan->fill($request->validated());
        $perusahaan->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrakerinPerusahaan $perusahaan)
    {
        $perusahaan->delete();

        return responseSuccessDelete();
    }
}
