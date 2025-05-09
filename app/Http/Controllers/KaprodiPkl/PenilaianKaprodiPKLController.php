<?php

namespace App\Http\Controllers\KaprodiPkl;

use App\DataTables\KaprodiPkl\PenilaianKaprodiPKLDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenilaianKaprodiPKLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenilaianKaprodiPKLDataTable $penilaianKaprodiPKLDataTable)
    {
        return $penilaianKaprodiPKLDataTable->render('pages.kaprodipkl.penilaian-kaprodipkl');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
