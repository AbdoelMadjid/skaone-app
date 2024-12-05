<?php

namespace App\Http\Controllers\Kurikulum\PerangkatKurikulum;

use App\DataTables\Kurikulum\PerangkatKurikulum\VersiKurikulumDataTable;
use App\Models\Kurikulum\PerangkatKurikulum\VersiKurikulum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatKurikulum\VersiKurikulumRequest;

class VersiKurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VersiKurikulumDataTable $versiKurikulumDataTable)
    {
        return $versiKurikulumDataTable->render('pages.kurikulum.perangkatkurikulum.versi-kurikulum');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kurikulum.perangkatkurikulum.versi-kurikulum-form', [
            'data' => new VersiKurikulum(),
            'action' => route('kurikulum.perangkatkurikulum.versi-kurikulum.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VersiKurikulumRequest $request)
    {
        $versiKurikulum = new VersiKurikulum($request->validated());
        $versiKurikulum->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(VersiKurikulum $versiKurikulum)
    {
        return view('pages.kurikulum.perangkatkurikulum.versi-kurikulum-form', [
            'data' => $versiKurikulum,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VersiKurikulum $versiKurikulum)
    {
        return view('pages.kurikulum.perangkatkurikulum.versi-kurikulum-form', [
            'data' => $versiKurikulum,
            'action' => route('kurikulum.perangkatkurikulum.versi-kurikulum.update', $versiKurikulum->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VersiKurikulumRequest $request, VersiKurikulum $versiKurikulum)
    {
        $versiKurikulum->fill($request->validated());
        $versiKurikulum->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VersiKurikulum $versiKurikulum)
    {
        $versiKurikulum->delete();

        return responseSuccessDelete();
    }
}
