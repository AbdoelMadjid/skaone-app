<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\KompetensiKeahlianDataTable;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\KompetensiKeahlianRequest;
use App\Models\ManajemenSekolah\BidangKeahlian;
use App\Models\ManajemenSekolah\ProgramKeahlian;

class KompetensiKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KompetensiKeahlianDataTable $kompetensiKeahlianDataTable)
    {
        return $kompetensiKeahlianDataTable->render('pages.manajemensekolah.keahlian.kompetensi-keahlian');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangKeahlian = BidangKeahlian::pluck('nama_bk', 'idbk')->toArray();
        $programKeahlian = ProgramKeahlian::pluck('nama_pk', 'idpk')->toArray();
        return view('pages.manajemensekolah.keahlian.kompetensi-keahlian-form', [
            'data' => new KompetensiKeahlian(),
            'bidangKeahlian' => $bidangKeahlian,
            'programKeahlian' => $programKeahlian,
            'action' => route('manajemensekolah.datakeahlian.kompetensi-keahlian.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KompetensiKeahlianRequest $request)
    {
        $kompetensiKeahlian = new KompetensiKeahlian($request->validated());
        $kompetensiKeahlian->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(KompetensiKeahlian $kompetensiKeahlian)
    {
        $bidangKeahlian = BidangKeahlian::pluck('nama_bk', 'idbk')->toArray();
        $programKeahlian = ProgramKeahlian::pluck('nama_pk', 'idpk')->toArray();
        return view('pages.manajemensekolah.keahlian.kompetensi-keahlian-form', [
            'data' => $kompetensiKeahlian,
            'bidangKeahlian' => $bidangKeahlian,
            'programKeahlian' => $programKeahlian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KompetensiKeahlian $kompetensiKeahlian)
    {
        $bidangKeahlian = BidangKeahlian::pluck('nama_bk', 'idbk')->toArray();
        $programKeahlian = ProgramKeahlian::pluck('nama_pk', 'idpk')->toArray();
        return view('pages.manajemensekolah.keahlian.kompetensi-keahlian-form', [
            'data' => $kompetensiKeahlian,
            'bidangKeahlian' => $bidangKeahlian,
            'programKeahlian' => $programKeahlian,
            'action' => route('manajemensekolah.datakeahlian.kompetensi-keahlian.update', $kompetensiKeahlian->idkk)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KompetensiKeahlianRequest $request, KompetensiKeahlian $kompetensiKeahlian)
    {
        $kompetensiKeahlian->fill($request->validated());
        $kompetensiKeahlian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KompetensiKeahlian $kompetensiKeahlian)
    {
        $kompetensiKeahlian->delete();

        return responseSuccessDelete();
    }
}
