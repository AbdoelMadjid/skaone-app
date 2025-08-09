<?php

namespace App\Http\Controllers\Pkl\AdministratorPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\AdministratorPkl\PerusahaanDataTable;
use App\Models\Pkl\AdministratorPkl\Perusahaan;
use App\Http\Requests\Pkl\AdministratorPkl\PerusahaanRequest;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PerusahaanDataTable $perusahaanDataTable)
    {
        return $perusahaanDataTable->render('pages.pkl.administratorpkl.perusahaan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pkl.administratorpkl.perusahaan-form', [
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
        return view('pages.pkl.administratorpkl.perusahaan-form', [
            'data' => $perusahaan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('pages.pkl.administratorpkl.perusahaan-form', [
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
