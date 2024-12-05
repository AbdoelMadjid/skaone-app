<?php

namespace App\Http\Controllers\AppSupport;

use App\DataTables\AppSupport\AppFiturDataTable;
use App\Http\Controllers\Controller;
use App\Models\AppSupport\AppFitur;
use App\Http\Requests\AppSupport\AppFiturRequest;
use Illuminate\Http\Request;

class AppFiturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AppFiturDataTable $appfiturDataTable)
    {
        return $appfiturDataTable->render('pages.appsupport.app-fitur');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.appsupport.app-fitur-form', [
            'data' => new AppFitur(),
            'action' => route('appsupport.app-fiturs.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppFiturRequest $request)
    {
        $appFitur = new AppFitur($request->validated());
        $appFitur->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(AppFitur $appFitur)
    {
        return view('pages.appsupport.app-fitur-form', [
            'data' => $appFitur,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppFitur $appFitur)
    {
        return view('pages.appsupport.app-fitur-form', [
            'data' => $appFitur,
            'action' => route('appsupport.app-fiturs.update', $appFitur->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppFiturRequest $request, AppFitur $appFitur)
    {
        $appFitur->fill($request->validated());
        $appFitur->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppFitur $appFitur)
    {
        $appFitur->delete();

        return responseSuccessDelete();
    }

    public function simpanStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'aktif' => 'required|string|in:Aktif,Non Aktif',
        ]);

        $appFitur = AppFitur::findOrFail($id);
        $appFitur->aktif = $validatedData['aktif'];
        $appFitur->save();

        return response()->json(['message' => 'Status berhasil diperbarui']);
    }
}
