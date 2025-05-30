<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\TokenSoalUjianDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\PerangkatUjian\TokenSoalUjian;
use Doctrine\Common\Lexer\Token;
use Illuminate\Http\Request;

class TokenSoalUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TokenSoalUjianDataTable $tokenSoalUjianDataTable)
    {
        return $tokenSoalUjianDataTable->render('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-token-soal-ujian');
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
    public function show(TokenSoalUjian $tokenSoalUjian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TokenSoalUjian $tokenSoalUjian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TokenSoalUjian $tokenSoalUjian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TokenSoalUjian $tokenSoalUjian)
    {
        //
    }
}
