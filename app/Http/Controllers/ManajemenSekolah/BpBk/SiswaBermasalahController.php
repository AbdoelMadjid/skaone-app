<?php

namespace App\Http\Controllers\ManajemenSekolah\BpBk;

use App\DataTables\ManajemenSekolah\BpBk\BpBkSiswaBermasalahDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaBermasalahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BpBkSiswaBermasalahDataTable $bpBkSiswaBermasalahDataTable)
    {
        return $bpBkSiswaBermasalahDataTable->render('pages.manajemensekolah.bpbk.konseling-siswa-bermasalah');
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
