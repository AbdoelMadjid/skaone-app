<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\BidangKeahlianDataTable;
use App\Models\ManajemenSekolah\BidangKeahlian;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\BidangKeahlianRequest;

class BidangKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BidangKeahlianDataTable $bidangKeahlianDataTable)
    {
        return $bidangKeahlianDataTable->render('pages.manajemensekolah.keahlian.bidang-keahlian');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.manajemensekolah.keahlian.bidang-keahlian-form', [
            'data' => new BidangKeahlian(),
            'action' => route('manajemensekolah.datakeahlian.bidang-keahlian.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BidangKeahlianRequest $request)
    {
        $bidangKeahlian = new BidangKeahlian($request->validated());
        $bidangKeahlian->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(BidangKeahlian $bidangKeahlian)
    {
        return view('pages.manajemensekolah.keahlian.bidang-keahlian-form', [
            'data' => $bidangKeahlian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidangKeahlian $bidangKeahlian)
    {
        return view('pages.manajemensekolah.keahlian.bidang-keahlian-form', [
            'data' => $bidangKeahlian,
            'action' => route('manajemensekolah.datakeahlian.bidang-keahlian.update', $bidangKeahlian->idbk)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BidangKeahlianRequest $request, BidangKeahlian $bidangKeahlian)
    {
        $bidangKeahlian->fill($request->validated());
        $bidangKeahlian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidangKeahlian $bidangKeahlian)
    {
        $bidangKeahlian->delete();

        return responseSuccessDelete();
    }
}
