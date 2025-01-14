<?php

namespace App\Http\Controllers\Kurikulum\PerangkatKurikulum;

use App\DataTables\Kurikulum\PerangkatKurikulum\PengumumanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatKurikulum\PengumumanRequest;
use App\Models\Kurikulum\PerangkatKurikulum\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PengumumanDataTable $pengumumanDataTable)
    {
        return $pengumumanDataTable->render('pages.kurikulum.perangkatkurikulum.pengumuman');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kurikulum.perangkatkurikulum.pengumuman-form', [
            'data' => new Pengumuman(),
            'action' => route('kurikulum.perangkatkurikulum.pengumuman.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PengumumanRequest $request)
    {
        $pengumuman = new Pengumuman($request->validated());
        $pengumuman->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('pages.kurikulum.perangkatkurikulum.pengumuman-form', [
            'data' => $pengumuman,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('pages.kurikulum.perangkatkurikulum.pengumuman-form', [
            'data' => $pengumuman,
            'action' => route('kurikulum.perangkatkurikulum.pengumuman.update', $pengumuman->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PengumumanRequest $request, Pengumuman $pengumuman)
    {
        $pengumuman->fill($request->validated());
        $pengumuman->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return responseSuccessDelete();
    }
}
