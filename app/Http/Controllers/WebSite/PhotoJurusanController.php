<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\PhotoJurusanDataTable;
use App\Helpers\ImageHelper;
use App\Models\WebSite\PhotoJurusan;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\PhotoJurusanRequest;
use App\Models\ManajemenSekolah\KompetensiKeahlian;


class PhotoJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PhotoJurusanDataTable $photoJurusanDataTable)
    {
        return $photoJurusanDataTable->render('pages.website.photo-jurusan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.website.photo-jurusan-form', [
            'data' => new PhotoJurusan(),
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('websiteapp.photo-jurusan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoJurusanRequest $request)
    {
        $photoJurusan = new PhotoJurusan($request->except(['image']));

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('image'),
                directory: 'images/jurusan_gmb',
                oldFileName: $photoJurusan->image ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'gjur_'
            );

            $photoJurusan->image = $imageName;
        }

        $photoJurusan->save();


        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoJurusan $photoJurusan)
    {
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.website.photo-jurusan-form', [
            'data' => $photoJurusan,
            'kompetensiKeahlian' => $kompetensiKeahlian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoJurusan $photoJurusan)
    {
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.website.photo-jurusan-form', [
            'data' => $photoJurusan,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('websiteapp.photo-jurusan.update', $photoJurusan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoJurusanRequest $request, PhotoJurusan $photoJurusan)
    {

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('image'),
                directory: 'images/jurusan_gmb',
                oldFileName: $photoJurusan->image ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'gjur_'
            );

            $photoJurusan->image = $imageName;
        }
        // Simpan instance PhotoJurusan ke database
        $photoJurusan->fill($request->except(['image']));
        $photoJurusan->save();

        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoJurusan $photoJurusan)
    {

        if ($photoJurusan->image) {
            $imagePath = base_path('images/jurusan_gmb/' . $photoJurusan->image);

            // Periksa dan hapus file gambar asli
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $photoJurusan->delete();

        return responseSuccessDelete();
    }
}
