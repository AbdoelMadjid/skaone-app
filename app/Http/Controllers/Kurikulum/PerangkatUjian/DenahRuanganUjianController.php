<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\DenahRuanganUjianDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatUjian\DenahRuanganUjianRequest;
use App\Models\Kurikulum\PerangkatUjian\DenahRuanganUjian;

class DenahRuanganUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DenahRuanganUjianDataTable $denahRuanganUjianDataTable)
    {
        return $denahRuanganUjianDataTable->render('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-denah-ruangan-ujian');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-denah-ruangan-ujian-form', [
            'data' => new DenahRuanganUjian(),
            'action' => route('kurikulum.perangkatujian.pelaksanaan-ujian.denah-ruangan-ujian.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DenahRuanganUjianRequest $request)
    {
        $denahRuanganUjian = new DenahRuanganUjian($request->validated());
        $denahRuanganUjian->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(DenahRuanganUjian $denahRuanganUjian)
    {
        return view('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-denah-ruangan-ujian-form', [
            'data' => $denahRuanganUjian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DenahRuanganUjian $denahRuanganUjian)
    {
        return view('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-denah-ruangan-ujian-form', [
            'data' => $denahRuanganUjian,
            'action' => route('kurikulum.perangkatujian.pelaksanaan-ujian.denah-ruangan-ujian.update', $denahRuanganUjian->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DenahRuanganUjianRequest $request, DenahRuanganUjian $denahRuanganUjian)
    {
        $denahRuanganUjian->fill($request->validated());
        $denahRuanganUjian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DenahRuanganUjian $denahRuanganUjian)
    {
        $denahRuanganUjian->delete();

        return responseSuccessDelete();
    }
}
