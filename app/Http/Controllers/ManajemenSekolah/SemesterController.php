<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\Events\SemesterStatusUpdated;
use App\Models\ManajemenSekolah\Semester;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\SemesterRequest;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(SemesterRequest $request)
    {
        // Validasi data
        $data = $request->validated();

        // Simpan semester baru
        $semester = Semester::create($data);

        // Trigger event untuk memperbarui semester lain
        event(new SemesterStatusUpdated($semester));

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SemesterRequest $request, Semester $semester)
    {
        // Validasi data
        $data = $request->validated();

        // Simpan perubahan
        $semester->fill($data)->save();

        // Trigger event untuk memperbarui semester lain
        event(new SemesterStatusUpdated($semester));

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        //
    }
}
