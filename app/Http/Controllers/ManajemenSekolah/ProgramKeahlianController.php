<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\ProgramKeahlianDataTable;
use App\Models\ManajemenSekolah\ProgramKeahlian;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\ProgramKeahlianRequest;
use App\Models\ManajemenSekolah\BidangKeahlian;

class ProgramKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProgramKeahlianDataTable $programKeahlianDataTable)
    {
        return $programKeahlianDataTable->render('pages.manajemensekolah.keahlian.program-keahlian');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangKeahlian = BidangKeahlian::pluck('nama_bk', 'idbk'); // Mengambil nama_bk sebagai key dan idbk sebagai value
        return view('pages.manajemensekolah.keahlian.program-keahlian-form', [
            'data' => new ProgramKeahlian(),
            'bidangKeahlian' => $bidangKeahlian,
            'action' => route('manajemensekolah.datakeahlian.program-keahlian.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramKeahlianRequest $request)
    {
        $programKeahlian = new ProgramKeahlian($request->validated());
        $programKeahlian->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramKeahlian $programKeahlian)
    {
        $bidangKeahlian = BidangKeahlian::pluck('nama_bk', 'idbk');
        return view('pages.manajemensekolah.keahlian.program-keahlian-form', [
            'data' => $programKeahlian,
            'bidangKeahlian' => $bidangKeahlian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramKeahlian $programKeahlian)
    {
        $bidangKeahlian = BidangKeahlian::pluck('nama_bk', 'idbk');
        return view('pages.manajemensekolah.keahlian.program-keahlian-form', [
            'data' => $programKeahlian,
            'bidangKeahlian' => $bidangKeahlian,
            'action' => route('manajemensekolah.datakeahlian.program-keahlian.update', $programKeahlian->idpk)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramKeahlianRequest $request, ProgramKeahlian $programKeahlian)
    {
        $programKeahlian->fill($request->validated());
        $programKeahlian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramKeahlian $programKeahlian)
    {
        $programKeahlian->delete();

        return responseSuccessDelete();
    }
}
