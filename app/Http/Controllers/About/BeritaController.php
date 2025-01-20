<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\BeritaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\BeritaRequest;
use App\Models\About\Berita;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(BeritaDataTable $beritaDataTable)
    {
        $beritas = Berita::withCount('likes', 'comments')->get();
        return $beritaDataTable->render('pages.about.berita', [
            'beritas' => $beritas,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.about.berita-form', [
            'data' => new Berita(),
            'action' => route('about.berita.store')
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BeritaRequest $request)
    {
        // Validasi gambar dengan ukuran maksimal 2048 KB
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:256000',
        ]);

        // Membuat instance Galery tanpa menyimpan file image terlebih dahulu
        $berita = new Berita($request->except(['image']));

        if ($request->hasFile('image')) {
            // Upload dan proses file gambar
            $image = $request->file('image');
            $imageName = 'berita_' . Str::uuid() . '.' . $image->extension();

            // Membuat dan menyimpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = base_path('images/thumbnail');
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
            //$destinationPath = base_path('images/galery');
            //$image->move($destinationPath, $imageName);

            // Menyimpan nama file ke database
            $berita->image = $imageName;
        }

        // Menyimpan data berita ke database
        $berita->save();

        return responseSuccess();
    }
    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return view('pages.about.berita-form', [
            'data' => $berita,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('pages.about.berita-form', [
            'data' => $berita,
            'action' => route('about.berita.update', $berita->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeritaRequest $request, Berita $berita)
    {
        // Validasi gambar jika diunggah
        $this->validate($request, [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:256000',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Hapus gambar dan thumbnail lama jika ada
            if ($berita->image) {
                //$oldImagePath = base_path('images/berita/' . $berita->image);
                $oldThumbnailPath = base_path('images/thumbnail/' . $berita->image);
                /* if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                } */
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload gambar baru dan buat thumbnail
            $beritaFile = $request->file('image');
            $beritaName = 'berita_' . Str::uuid() . '.' . $beritaFile->extension();

            // Buat dan simpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = base_path('images/thumbnail');
            $img = Image::make($beritaFile->path());

            // Tentukan persentase ukuran (misalnya 50% dari ukuran asli)
            $percentage = 50; // 50% dari ukuran asli

            // Hitung dimensi baru berdasarkan persentase
            $newWidth = $img->width() * ($percentage / 100);
            $newHeight = $img->height() * ($percentage / 100);

            // Resize dengan persentase
            $img->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $beritaName);

            // Simpan gambar asli di `public/images/berita`
            //$destinationPath = base_path('images/berita');
            //$beritaFile->move($destinationPath, $beritaName);

            // Perbarui nama file gambar di database
            $berita->image = $beritaName;
        }

        // Simpan data lainnya ke dalam instance berita tanpa field `image`
        $berita->fill($request->except(['image']));
        $berita->save();

        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        // Hapus file gambar dan thumbnail jika ada
        if ($berita->image) {
            //$imagePath = base_path('images/berita/' . $berita->image);
            $thumbnailPath = base_path('images/thumbnail/' . $berita->image);

            // Periksa dan hapus file gambar asli
            /* if (file_exists($imagePath)) {
                unlink($imagePath);
            } */

            // Periksa dan hapus file thumbnail
            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
        }

        $berita->delete();

        return responseSuccessDelete();
    }
}
