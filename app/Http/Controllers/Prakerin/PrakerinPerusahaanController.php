<?php

namespace App\Http\Controllers\Prakerin;

use App\DataTables\Prakerin\PrakerinPerusahaanDataTable;
use App\Http\Controllers\Controller;
use App\Models\Prakerin\PrakerinPerusahaan;
use Illuminate\Http\Request;

class PrakerinPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrakerinPerusahaanDataTable $prakerinPerusahaanDataTable)
    {
        return $prakerinPerusahaanDataTable->render('pages.prakerin.perusahaan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.prakerin.perusahaan-form', [
            'data' => new PrakerinPerusahaan(),
            'action' => route('panitiaprakerin.perusahaan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
