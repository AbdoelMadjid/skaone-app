<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\WaliKelasDataTable;
use App\Models\ManajemenSekolah\WaliKelas;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\WaliKelasRequest;

class WaliKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WaliKelasDataTable $waliKelasDataTable)
    {
        return $waliKelasDataTable->render('pages.manajemensekolah.jabatan.wali-kelas');
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
    public function store(WaliKelasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WaliKelas $waliKelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WaliKelas $waliKelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WaliKelasRequest $request, WaliKelas $waliKelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WaliKelas $waliKelas)
    {
        //
    }
}
