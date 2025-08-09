<?php

namespace App\Http\Controllers\Pkl\PembimbingPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\PembimbingPkl\PesertaTerbimbingDataTable;
use App\Models\Pkl\AdministratorPkl\PembimbingPrakerin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesertaBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PesertaTerbimbingDataTable $pesertaTerbimbingDataTable)
    {
        // Mengambil id_personil dari user yang sedang login
        return $pesertaTerbimbingDataTable->render("pages.pkl.pembimbingpkl.peserta-prakerin");
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
    public function show(PembimbingPrakerin $pembimbingPrakerin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PembimbingPrakerin $pembimbingPrakerin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PembimbingPrakerin $pembimbingPrakerin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembimbingPrakerin $pembimbingPrakerin)
    {
        //
    }
}
