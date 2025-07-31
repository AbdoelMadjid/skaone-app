<?php

namespace App\Http\Controllers\Prakerin\Panitia;

use App\DataTables\Prakerin\Panitia\PrakerinAdminNegoDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prakerin\Panitia\PrakerinAdminNegoRequest;
use App\Models\Prakerin\Panitia\PrakerinAdminNego;
use Illuminate\Http\Request;

class PrakerinAdminNegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrakerinAdminNegoDataTable $prakerinAdminNegoDataTable)
    {
        return $prakerinAdminNegoDataTable->render('pages.prakerin.panitia.administrasi-admin-nego');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.prakerin.panitia.administrasi-admin-nego-form', [
            'data' => new PrakerinAdminNego(),
            'action' => route('panitiaprakerin.administrasi.admin-nego.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrakerinAdminNegoRequest $request)
    {
        $adminNego = new PrakerinAdminNego($request->validated());
        $adminNego->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PrakerinAdminNego $adminNego)
    {
        return view('pages.prakerin.panitia.administrasi-admin-nego-form', [
            'data' => $adminNego,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrakerinAdminNego $adminNego)
    {
        return view('pages.prakerin.panitia.administrasi-admin-nego-form', [
            'data' => $adminNego,
            'action' => route('panitiaprakerin.administrasi.admin-nego.update', $adminNego->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrakerinAdminNegoRequest $request, PrakerinAdminNego $adminNego)
    {
        $adminNego->fill($request->validated());
        $adminNego->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrakerinAdminNego $adminNego)
    {
        $adminNego->delete();

        return responseSuccessDelete();
    }
}
