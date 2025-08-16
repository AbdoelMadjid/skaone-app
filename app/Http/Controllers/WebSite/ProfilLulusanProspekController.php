<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\ProfilLulusanProspekDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\ProfilLulusanProspekRequest;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\WebSite\ProfilLulusanProspek;
use Illuminate\Http\Request;

class ProfilLulusanProspekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProfilLulusanProspekDataTable $profilLulusanProspekDataTable)
    {
        return $profilLulusanProspekDataTable->render('pages.website.profil-jurusan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.website.profil-jurusan-form', [
            'data' => new ProfilLulusanProspek(),
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('websiteapp.profil-jurusan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfilLulusanProspekRequest $request)
    {
        /* $profil_jurusan = new ProfilLulusanProspek($request->validated());
        $profil_jurusan->save();

        return responseSuccess(); */

        $validated = $request->validated();

        foreach ($validated['deskripsi'] as $deskripsi) {
            ProfilLulusanProspek::create([
                'id_kk' => $validated['id_kk'],
                'tipe' => $validated['tipe'],
                'deskripsi' => $deskripsi,
            ]);
        }

        return responseSuccess();
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
    public function edit(ProfilLulusanProspek $profil_jurusan)
    {
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.website.profil-jurusan-form', [
            'data' => $profil_jurusan,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('websiteapp.profil-jurusan.update', $profil_jurusan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfilLulusanProspekRequest $request, ProfilLulusanProspek $profil_jurusan)
    {
        $profil_jurusan->fill($request->validated());
        $profil_jurusan->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilLulusanProspek $profil_jurusan)
    {
        $profil_jurusan->delete();

        return responseSuccessDelete();
    }
}
