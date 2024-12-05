<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\IdentitasSekolahDataTable;
use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\IdentitasSekolahRequest;

class IdentitasSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IdentitasSekolahDataTable $identitasSekolahDataTable)
    {
        return $identitasSekolahDataTable->render('pages.manajemensekolah.identitas-sekolah');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.manajemensekolah.identitas-sekolah-form', [
            'data' => new IdentitasSekolah(),
            'action' => route('manajemensekolah.identitas-sekolah.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdentitasSekolahRequest $request)
    {
        $identitasSekolah = new IdentitasSekolah($request->except(['logo_sekolah']));

        // Check if a new icon is uploaded
        if ($request->hasFile('logo_sekolah')) {
            // Delete the old icon if it exists
            if ($identitasSekolah->logo_sekolah) {
                $oldIconPath = public_path('images' . $identitasSekolah->logo_sekolah);
                if (file_exists($oldIconPath)) {
                    unlink($oldIconPath);
                }
            }
            // Upload the new icon
            $identitasSekolahFile = $request->file('logo_sekolah');
            $identitasSekolahName = time() . '_' . $identitasSekolahFile->getClientOriginalName();
            $identitasSekolahFile->move(public_path('images'), $identitasSekolahName);
            $identitasSekolah->logo_sekolah = $identitasSekolahName;
        }

        $identitasSekolah->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(IdentitasSekolah $identitasSekolah)
    {
        return view('pages.manajemensekolah.identitas-sekolah-form', [
            'data' => $identitasSekolah,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IdentitasSekolah $identitasSekolah)
    {
        return view('pages.manajemensekolah.identitas-sekolah-form', [
            'data' => $identitasSekolah,
            'action' => route('manajemensekolah.identitas-sekolah.update', $identitasSekolah->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdentitasSekolahRequest $request, IdentitasSekolah $identitasSekolah)
    {
        // Check if a new icon is uploaded
        if ($request->hasFile('logo_sekolah')) {
            // Delete the old icon if it exists
            if ($identitasSekolah->logo_sekolah) {
                $oldLogoPath = public_path('images/' . $identitasSekolah->logo_sekolah);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
            // Upload the new Logo
            $appLogoFile = $request->file('logo_sekolah');
            $appLogoName = time() . '_' . $appLogoFile->getClientOriginalName();
            $appLogoFile->move(public_path('images'), $appLogoName);
            $identitasSekolah->logo_sekolah = $appLogoName;
        }

        // Update the remaining fields
        $identitasSekolah->fill($request->except(['logo_sekolah']));
        $identitasSekolah->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IdentitasSekolah $identitasSekolah)
    {
        $identitasSekolah->delete();

        return responseSuccessDelete();
    }
}
