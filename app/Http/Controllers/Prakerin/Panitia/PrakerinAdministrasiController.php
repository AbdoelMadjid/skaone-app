<?php

namespace App\Http\Controllers\Prakerin\Panitia;

use App\Http\Controllers\Controller;
use App\Models\Prakerin\Panitia\PrakerinIdentitas;
use Illuminate\Http\Request;

class PrakerinAdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identPrakerin = PrakerinIdentitas::where('status', 'Aktif')->first(); // Ambil 1 data aktif

        return view('pages.prakerin.panitia.administrasi', [
            'identPrakerin' => $identPrakerin,
        ]);
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
