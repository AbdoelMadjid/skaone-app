<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\PhotoSlideDataTable;
use App\Helpers\ImageHelper;
use App\Models\WebSite\PhotoSlide;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\PhotoSlideRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class PhotoSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PhotoSlideDataTable $photoSlideDataTable)
    {
        return $photoSlideDataTable->render('pages.website.photo-slide');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.website.photo-slide-form', [
            'data' => new PhotoSlide(),
            'action' => route('websiteapp.photo-slides.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoSlideRequest $request)
    {
        $photoSlide = new PhotoSlide($request->except(['gambar']));

        if ($request->hasFile('gambar')) {
            $imageFile = $request->file('gambar');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('gambar'),
                directory: 'images/photoslide',
                oldFileName: $photoSlide->gambar ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'slide_'
            );

            $photoSlide->gambar = $imageName;
        }

        // Menyimpan data gallery ke database
        $photoSlide->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoSlide $photoSlide)
    {
        return view('pages.website.photo-slide-form', [
            'data' => $photoSlide,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoSlide $photoSlide)
    {
        return view('pages.website.photo-slide-form', [
            'data' => $photoSlide,
            'action' => route('websiteapp.photo-slides.update', $photoSlide->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoSlideRequest $request, PhotoSlide $photoSlide)
    {
        if ($request->hasFile('gambar')) {
            $imageFile = $request->file('gambar');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('gambar'),
                directory: 'images/photoslide',
                oldFileName: $photoSlide->gambar ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'slide_'
            );

            $photoSlide->gambar = $imageName;
        }

        // Simpan instance photoSlide ke database
        $photoSlide->fill($request->except(['gambar']));
        $photoSlide->save();

        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoSlide $photoSlide)
    {
        if ($photoSlide->gambar) {
            $imagePath = base_path('images/photoslide/' . $photoSlide->gambar);

            // Periksa dan hapus file image
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $photoSlide->delete();

        return responseSuccessDelete();
    }
}
