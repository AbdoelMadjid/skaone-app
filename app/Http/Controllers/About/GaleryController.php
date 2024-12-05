<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\GaleryDataTable;
use App\Models\About\Galery;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\GaleryRequest;
use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\PersonilSekolah;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\RedirectResponse;


class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GaleryDataTable $galeryDataTable)
    {
        return $galeryDataTable->render('pages.about.galery');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryGalery = Referensi::where('jenis', 'KategoriGalery')->pluck('data', 'data')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'namalengkap')->toArray();
        return view('pages.about.galery-form', [
            'data' => new Galery(),
            'categoryGalery' => $categoryGalery,
            'personilSekolah' => $personilSekolah,
            'action' => route('about.galery.store')
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
            // Upload dan proses file gambar
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();

            // Membuat dan menyimpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = public_path('images/thumbnail');
            $img = Image::make($image->path());

            // Tentukan persentase ukuran yang diinginkan (misalnya 50% dari ukuran asli)
            $percentage = 50; // 50% dari ukuran asli

            // Hitung dimensi baru berdasarkan persentase
            $newWidth = $img->width() * ($percentage / 100);
            $newHeight = $img->height() * ($percentage / 100);

            // Resize dengan persentase
            $img->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $imageName);

            // Menyimpan file gambar asli di `public/images/galery`
            $destinationPath = public_path('images/galery');
            $image->move($destinationPath, $imageName);

            // Menyimpan nama file ke database
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
        return view('pages.about.galery-form', [
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
        return view('pages.about.galery-form', [
            'data' => $galery,
            'categoryGalery' => $categoryGalery,
            'personilSekolah' => $personilSekolah,
            'action' => route('about.galery.update', $galery->id)
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

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Hapus gambar dan thumbnail lama jika ada
            if ($galery->image) {
                $oldImagePath = public_path('images/galery/' . $galery->image);
                $oldThumbnailPath = public_path('images/thumbnail/' . $galery->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload gambar baru dan buat thumbnail
            $galeryFile = $request->file('image');
            $galeryName = time() . '.' . $galeryFile->extension();

            // Buat dan simpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = public_path('images/thumbnail');
            $img = Image::make($galeryFile->path());

            // Tentukan persentase ukuran (misalnya 50% dari ukuran asli)
            $percentage = 50; // 50% dari ukuran asli

            // Hitung dimensi baru berdasarkan persentase
            $newWidth = $img->width() * ($percentage / 100);
            $newHeight = $img->height() * ($percentage / 100);

            // Resize dengan persentase
            $img->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $galeryName);

            // Simpan gambar asli di `public/images/galery`
            $destinationPath = public_path('images/galery');
            $galeryFile->move($destinationPath, $galeryName);

            // Perbarui nama file gambar di database
            $galery->image = $galeryName;
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
        // Hapus file gambar dan thumbnail jika ada
        if ($galery->image) {
            $imagePath = public_path('images/galery/' . $galery->image);
            $thumbnailPath = public_path('images/thumbnail/' . $galery->image);

            // Periksa dan hapus file gambar asli
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Periksa dan hapus file thumbnail
            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
        }

        // Hapus data dari database
        $galery->delete();

        return responseSuccessDelete();
    }
}
