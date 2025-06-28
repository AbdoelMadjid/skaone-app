<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\GaleryDataTable;
use App\Helpers\ImageHelper;
use App\Models\WebSite\Galery;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\GaleryRequest;
use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Http\RedirectResponse;


class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GaleryDataTable $galeryDataTable)
    {
        return $galeryDataTable->render('pages.website.galery');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryGalery = Referensi::where('jenis', 'KategoriGalery')->pluck('data', 'data')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'namalengkap')->toArray();
        return view('pages.website.galery-form', [
            'data' => new Galery(),
            'categoryGalery' => $categoryGalery,
            'personilSekolah' => $personilSekolah,
            'action' => route('websiteapp.galery.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GaleryRequest $request)
    {
        // Validasi gambar dengan ukuran maksimal 2048 KB
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:256000',
        ]);

        // Membuat instance Galery tanpa menyimpan file image terlebih dahulu
        $gallery = new Galery($request->except(['image']));

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('image'),
                directory: 'images/galery',
                oldFileName: $gallery->image ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'gal_'
            );

            $gallery->image = $imageName;
        }

        // Menyimpan data gallery ke database
        $gallery->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Galery $galery)
    {
        $categoryGalery = Referensi::where('jenis', 'KategoriGalery')->pluck('data', 'data')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'namalengkap')->toArray();
        return view('pages.website.galery-form', [
            'data' => $galery,
            'categoryGalery' => $categoryGalery,
            'personilSekolah' => $personilSekolah,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galery $galery)
    {
        $categoryGalery = Referensi::where('jenis', 'KategoriGalery')->pluck('data', 'data')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'namalengkap')->toArray();
        return view('pages.website.galery-form', [
            'data' => $galery,
            'categoryGalery' => $categoryGalery,
            'personilSekolah' => $personilSekolah,
            'action' => route('websiteapp.galery.update', $galery->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GaleryRequest $request, Galery $galery)
    {
        // Validasi gambar jika diunggah
        $this->validate($request, [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:256000',
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('image'),
                directory: 'images/galery',
                oldFileName: $galery->image ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'gal_'
            );

            $galery->image = $imageName;
        }

        // Simpan data lainnya ke dalam instance galery tanpa field `image`
        $galery->fill($request->except(['image']));
        $galery->save();

        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        if ($galery->image) {
            $imagePath = base_path('images/galery/' . $galery->image);

            // Periksa dan hapus file image
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Hapus data dari database
        $galery->delete();

        return responseSuccessDelete();
    }
}
