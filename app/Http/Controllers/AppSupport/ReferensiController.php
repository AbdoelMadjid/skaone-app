<?php

namespace App\Http\Controllers\AppSupport;

use App\DataTables\AppSupport\ReferensiDataTable;
use App\Models\AppSupport\Referensi;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppSupport\ReferensiRequest;

class ReferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ReferensiDataTable $referensiDataTable)
    {
        return $referensiDataTable->render('pages.appsupport.referensi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisOptions = Referensi::select('jenis')->distinct()->pluck('jenis');

        return view('pages.appsupport.referensi-form', [
            'data' => new Referensi(),
            'action' => route('appsupport.referensi.store'),
            'jenisOptions' => $jenisOptions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReferensiRequest $request)
    {
        $jenis = $request->input('jenis') == 'new' ? $request->input('jenis_new') : $request->input('jenis');

        $referensi = new Referensi([
            'jenis' => $jenis,
            'data' => $request->input('data'),
        ]);
        $referensi->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Referensi $referensi)
    {
        return view('pages.appsupport.referensi-form', [
            'data' => $referensi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Referensi $referensi)
    {
        $jenisOptions = Referensi::select('jenis')->distinct()->pluck('jenis');

        return view('pages.appsupport.referensi-form', [
            'data' => $referensi,
            'action' => route('appsupport.referensi.update', $referensi->id),
            'jenisOptions' => $jenisOptions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReferensiRequest $request, Referensi $referensi)
    {
        $jenis = $request->input('jenis') == 'new' ? $request->input('jenis_new') : $request->input('jenis');

        $referensi->update([
            'jenis' => $jenis,
            'data' => $request->input('data'),
        ]);

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referensi $referensi)
    {
        $referensi->delete();

        return responseSuccessDelete();
    }
}
