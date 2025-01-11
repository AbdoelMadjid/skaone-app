<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\PhotoSlideDataTable;
use App\Models\About\PhotoSlide;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\PhotoSlideRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

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

        if ($request->hasFile('gambar')) {
            // Upload dan proses file gambar
            $image = $request->file('gambar');
            $imageName = 'slide_' . Str::uuid() . '.' . $image->extension();

            // Membuat dan menyimpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = base_path('images/thumbnail');
            $img = Image::make($image->path());

            // Tentukan persentase ukuran yang diinginkan (misalnya 50% dari ukuran asli)
            $percentage = 75; // 50% dari ukuran asli

            // Hitung dimensi baru berdasarkan persentase
            $newWidth = $img->width() * ($percentage / 100);
            $newHeight = $img->height() * ($percentage / 100);

            // Resize dengan persentase
            $img->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $imageName);

            // Menyimpan file gambar asli di `public/images/galery`
            //$destinationPath = base_path('images/galery');
            //$image->move($destinationPath, $imageName);

            // Menyimpan nama file ke database
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
        if ($request->hasFile('gambar')) {
            // Hapus gambar dan thumbnail lama jika ada
            if ($photoSlide->gambar) {
                //$oldImagePath = base_path('images/gambarjurusan/' . $photoSlide->image);
                $oldThumbnailPath = base_path('images/thumbnail/' . $photoSlide->gambar);
                /* if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                } */
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload gambar baru dan buat thumbnail
            $imageFile = $request->file('gambar');
            $imageName = 'gjur_' . time() . '.' . $imageFile->extension();

            // Buat dan simpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = base_path('images/thumbnail');
            $img = Image::make($imageFile->path());

            // Tentukan persentase ukuran (misalnya 50% dari ukuran asli)
            $percentage = 50; // 50% dari ukuran asli

            // Hitung dimensi baru berdasarkan persentase
            $newWidth = $img->width() * ($percentage / 100);
            $newHeight = $img->height() * ($percentage / 100);

            // Resize dengan persentase
            $img->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $imageName);

            // Simpan gambar asli di `public/images/galery`
            //$destinationPath = base_path('images/gambarjurusan');
            //$imageFile->move($destinationPath, $imageName);

            // Perbarui nama file gambar di database
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
        // Hapus file gambar dan thumbnail jika ada
        if ($photoSlide->gambar) {
            //$imagePath = base_path('images/galery/' . $galery->image);
            $thumbnailPath = base_path('images/thumbnail/' . $photoSlide->gambar);

            // Periksa dan hapus file gambar asli
            /* if (file_exists($imagePath)) {
                unlink($imagePath);
            } */

            // Periksa dan hapus file thumbnail
            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
        }
        $photoSlide->delete();

        return responseSuccessDelete();
    }
}
