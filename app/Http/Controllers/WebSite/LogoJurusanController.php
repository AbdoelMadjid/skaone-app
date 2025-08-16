<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\LogoJurusanDataTable;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\LogoJurusanRequest;
use App\Http\Requests\WebSite\PhotoJurusanRequest;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\WebSite\LogoJurusan;
use Illuminate\Http\Request;

class LogoJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LogoJurusanDataTable $logoJurusanDataTable)
    {
        return $logoJurusanDataTable->render('pages.website.logo-jurusan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.website.logo-jurusan-form', [
            'data' => new LogoJurusan(),
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('websiteapp.logo-jurusan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoJurusanRequest $request)
    {
        $logo_jurusan = new LogoJurusan($request->except(['logo']));

        if ($request->hasFile('logo')) {
            $imageFile = $request->file('logo');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('logo'),
                directory: 'images/jurusan_logo',
                oldFileName: $logo_jurusan->logo ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'logo_'
            );

            $logo_jurusan->logo = $imageName;
        }

        $logo_jurusan->save();


        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(LogoJurusan $logo_jurusan)
    {
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.website.logo-jurusan-form', [
            'data' => $logo_jurusan,
            'kompetensiKeahlian' => $kompetensiKeahlian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LogoJurusan $logo_jurusan)
    {
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.website.logo-jurusan-form', [
            'data' => $logo_jurusan,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('websiteapp.logo-jurusan.update', $logo_jurusan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LogoJurusanRequest $request, LogoJurusan $logo_jurusan)
    {
        if ($request->hasFile('logo')) {
            $imageFile = $request->file('logo');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('logo'),
                directory: 'images/jurusan_logo',
                oldFileName: $logo_jurusan->logo ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'logo_'
            );

            $logo_jurusan->logo = $imageName;
        }
        // Simpan instance logo_jurusan ke database
        $logo_jurusan->fill($request->except(['logo']));
        $logo_jurusan->save();

        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogoJurusan $logo_jurusan)
    {
        if ($logo_jurusan->logo) {
            $imagePath = base_path('images/jurusan_logo/' . $logo_jurusan->logo);

            // Periksa dan hapus file gambar asli
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $logo_jurusan->delete();

        return responseSuccessDelete();
    }
}
