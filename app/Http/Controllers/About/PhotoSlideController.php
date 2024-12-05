<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\PhotoSlideDataTable;
use App\Models\About\PhotoSlide;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\PhotoSlideRequest;
use Illuminate\Http\Request;

class PhotoSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PhotoSlideDataTable $photoSlideDataTable)
    {
        return $photoSlideDataTable->render('pages.about.photo-slide');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.about.photo-slide-form', [
            'data' => new PhotoSlide(),
            'action' => route('about.photo-slides.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoSlideRequest $request)
    {
        $photoSlide = new PhotoSlide($request->except(['gambar']));

        // Check if a new icon is uploaded
        if ($request->hasFile('gambar')) {
            // Delete the old icon if it exists
            if ($photoSlide->gambar) {
                $oldIconPath = base_path('images/photoslide/' . $photoSlide->gambar);
                if (file_exists($oldIconPath)) {
                    unlink($oldIconPath);
                }
            }
            // Upload the new icon
            $photoSlideFile = $request->file('gambar');
            $photoSlideName = time() . '_' . $photoSlideFile->getClientOriginalName();
            $photoSlideFile->move(base_path('images/photoslide'), $photoSlideName);
            $photoSlide->gambar = $photoSlideName;
        }
        // Simpan instance PhotoSlide ke database

        $photoSlide->save();


        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoSlide $photoSlide)
    {
        return view('pages.about.photo-slide-form', [
            'data' => $photoSlide,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoSlide $photoSlide)
    {
        return view('pages.about.photo-slide-form', [
            'data' => $photoSlide,
            'action' => route('about.photo-slides.update', $photoSlide->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoSlideRequest $request, PhotoSlide $photoSlide)
    {
        //$photoSlide = new PhotoSlide($request->except(['gambar']));

        // Check if a new icon is uploaded
        if ($request->hasFile('gambar')) {
            // Delete the old icon if it exists
            if ($photoSlide->gambar) {
                $oldIconPath = base_path('images/photoslide/' . $photoSlide->gambar);
                if (file_exists($oldIconPath)) {
                    unlink($oldIconPath);
                }
            }
            // Upload the new icon
            $photoSlideFile = $request->file('gambar');
            $photoSlideName = time() . '_' . $photoSlideFile->getClientOriginalName();
            $photoSlideFile->move(base_path('images/photoslide'), $photoSlideName);
            $photoSlide->gambar = $photoSlideName;
        }
        // Simpan instance PhotoSlide ke database
        $photoSlide->fill($request->except(['gambar']));
        $photoSlide->save();


        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoSlide $photoSlide)
    {
        // Hapus file gambar dan thumbnail jika ada
        if ($photoSlide->gambar) {
            $imagePath = base_path('images/photoslide/' . $photoSlide->gambar);

            // Periksa dan hapus file gambar asli
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $photoSlide->delete();

        return responseSuccessDelete();
    }
}
