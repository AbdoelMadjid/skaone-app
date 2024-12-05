<?php

namespace App\Http\Controllers\AdministratorPkl;

use App\DataTables\AdministratorPkl\PerusahaanDataTable;
use App\Models\AdministratorPkl\Perusahaan;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdministratorPkl\PerusahaanRequest;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PerusahaanDataTable $perusahaanDataTable)
    {
        return $perusahaanDataTable->render('pages.administratorpkl.perusahaan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.administratorpkl.perusahaan-form', [
            'data' => new Perusahaan(),
            'action' => route('administratorpkl.perusahaan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PerusahaanRequest $request)
    {
        $perusahaan = new Perusahaan($request->validated());
        $perusahaan->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        return view('pages.administratorpkl.perusahaan-form', [
            'data' => $perusahaan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('pages.administratorpkl.perusahaan-form', [
            'data' => $perusahaan,
            'action' => route('administratorpkl.perusahaan.update', $perusahaan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PerusahaanRequest $request, Perusahaan $perusahaan)
    {
        $perusahaan->fill($request->validated());
        $perusahaan->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();

        return responseSuccessDelete();
    }
}
