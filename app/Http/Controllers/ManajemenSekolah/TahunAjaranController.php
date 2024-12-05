<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\TahunAjaranDataTable;
use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Http\Requests\ManajemenSekolah\TahunAjaranRequest;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TahunAjaranDataTable $tahunAjaranDataTable)
    {
        return $tahunAjaranDataTable->render('pages.manajemensekolah.tahun-ajaran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.manajemensekolah.tahun-ajaran-form', [
            'data' => new TahunAjaran(),
            'action' => route('manajemensekolah.tahun-ajaran.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TahunAjaranRequest $request)
    {
        $tahunAjaran = new TahunAjaran($request->validated());
        $tahunAjaran->save();

        // Create semesters for the new Tahun Ajaran
        $tahunAjaran->semesters()->createMany([
            ['semester' => 'Ganjil', 'status' => 'Non Aktif'],
            ['semester' => 'Genap', 'status' => 'Non Aktif'],
        ]);

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(TahunAjaran $tahunAjaran)
    {
        return view('pages.manajemensekolah.tahun-ajaran-form', [
            'data' => $tahunAjaran,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahunAjaran $tahunAjaran)
    {
        return view('pages.manajemensekolah.tahun-ajaran-form', [
            'data' => $tahunAjaran,
            'action' => route('manajemensekolah.tahun-ajaran.update', $tahunAjaran->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TahunAjaranRequest $request, TahunAjaran $tahunAjaran)
    {
        // Jika status "Aktif" diubah menjadi "Aktif"
        if ($request->input('status') === 'Aktif') {
            TahunAjaran::where('id', '!=', $tahunAjaran->id)
                ->update(['status' => 'Non Aktif']);
        }

        $tahunAjaran->fill($request->validated());
        $tahunAjaran->save();

        // Update related semesters (you can set rules for which semester is active here)
        $tahunAjaran->semesters()->update([
            'status' => 'Non Aktif'
        ]);

        // Activate the specific semester if needed
        $activeSemester = $request->input('active_semester'); // 'Ganjil' or 'Genap'
        $tahunAjaran->semesters()->where('semester', $activeSemester)->update(['status' => 'Aktif']);

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        $tahunAjaran->delete();

        return responseSuccessDelete();
    }
}
