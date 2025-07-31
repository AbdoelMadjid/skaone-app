<?php

namespace App\Http\Controllers\Prakerin\Panitia;

use App\DataTables\Prakerin\Panitia\PrakerinNegosiatorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prakerin\Panitia\PrakerinNegosiatorRequest;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\Prakerin\Panitia\PrakerinNegosiator;
use Illuminate\Http\Request;

class PrakerinNegosiatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrakerinNegosiatorDataTable $prakerinNegosiatorDataTable)
    {
        return $prakerinNegosiatorDataTable->render('pages.prakerin.panitia.administrasi-negosiator');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $personilOptions = PersonilSekolah::where('aktif', 'Aktif')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.prakerin.panitia.administrasi-negosiator-form', [
            'data' => new PrakerinNegosiator(),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'personilOptions' => $personilOptions,
            'action' => route('panitiaprakerin.administrasi.negosiator.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrakerinNegosiatorRequest $request)
    {
        $negosiator = new PrakerinNegosiator($request->validated());
        $negosiator->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PrakerinNegosiator $negosiator)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $personilOptions = PersonilSekolah::where('aktif', 'Aktif')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.prakerin.panitia.administrasi-negosiator-form', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'personilOptions' => $personilOptions,
            'data' => $negosiator,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrakerinNegosiator $negosiator)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $personilOptions = PersonilSekolah::where('aktif', 'Aktif')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.prakerin.panitia.administrasi-negosiator-form', [
            'data' => $negosiator,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'personilOptions' => $personilOptions,
            'action' => route('panitiaprakerin.administrasi.negosiator.update', $negosiator->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrakerinNegosiatorRequest $request, PrakerinNegosiator $negosiator)
    {
        $negosiator->fill($request->validated());
        $negosiator->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrakerinNegosiator $negosiator)
    {
        $negosiator->delete();

        return responseSuccessDelete();
    }
}
