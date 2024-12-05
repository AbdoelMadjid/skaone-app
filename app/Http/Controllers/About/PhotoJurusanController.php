<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\PhotoJurusanDataTable;
use App\Models\About\PhotoJurusan;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\PhotoJurusanRequest;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use Intervention\Image\ImageManagerStatic as Image;


class PhotoJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PhotoJurusanDataTable $photoJurusanDataTable)
    {
        return $photoJurusanDataTable->render('pages.about.photo-jurusan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return view('pages.about.photo-jurusan-form', [
            'data' => new PhotoJurusan(),
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('about.photo-jurusan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoJurusanRequest $request)
    {
        $photoJurusan = new PhotoJurusan($request->except(['image']));

        if ($request->hasFile('image')) {
            // Upload dan proses file gambar
            $image = $request->file('image');
            $imageName = 'gjur_' . time() . '.' . $image->extension();

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
            $destinationPath = base_path('images/gambarjurusan');
            $image->move($destinationPath, $imageName);

            // Menyimpan nama file ke database
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
        return view('pages.about.photo-jurusan-form', [
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
        return view('pages.about.photo-jurusan-form', [
            'data' => $photoJurusan,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('about.photo-jurusan.update', $photoJurusan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoJurusanRequest $request, PhotoJurusan $photoJurusan)
    {

        if ($request->hasFile('image')) {
            // Hapus gambar dan thumbnail lama jika ada
            if ($photoJurusan->image) {
                $oldImagePath = base_path('images/gambarjurusan/' . $photoJurusan->image);
                $oldThumbnailPath = base_path('images/thumbnail/' . $photoJurusan->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload gambar baru dan buat thumbnail
            $imageFile = $request->file('image');
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
            $destinationPath = base_path('images/gambarjurusan');
            $imageFile->move($destinationPath, $imageName);

            // Perbarui nama file gambar di database
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
        // Hapus file image dan thumbnail jika ada
        if ($photoJurusan->image) {
            $imagePath = base_path('images/gambarjurusan/' . $photoJurusan->image);

            // Periksa dan hapus file gambar asli
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $photoJurusan->delete();

        return responseSuccessDelete();
    }
}
