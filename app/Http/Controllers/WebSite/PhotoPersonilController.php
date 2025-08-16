<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\PhotoPersonilDataTable;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\PhotoPersonilRequest;
use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\WebSite\PhotoPersonil;
use Illuminate\Http\Request;

class PhotoPersonilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PhotoPersonilDataTable $photoPersonilDataTable)
    {
        return $photoPersonilDataTable->render('pages.website.photo-personil');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nomorOptions = [];
        for ($i = 1; $i <= 25; $i++) {
            $nomorOptions[$i] = (string) $i;
        }

        $groupnameOption = Referensi::where('jenis', 'GroupPersonil')->pluck('data', 'data')->toArray();
        $personilSekolah = PersonilSekolah::where('aktif', 'Aktif')->orderBy('namalengkap', 'asc')->pluck('namalengkap', 'id_personil')->toArray();
        return view('pages.website.photo-personil-form', [
            'data' => new PhotoPersonil(),
            'groupnameOption' => $groupnameOption,
            'personilSekolah' => $personilSekolah,
            'nomorOptions' => $nomorOptions,
            'action' => route('websiteapp.photo-personil.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoPersonilRequest $request)
    {
        $photoPersonil = new PhotoPersonil($request->except(['photo']));

        if ($request->hasFile('photo')) {
            $imageFile = $request->file('photo');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('photo'),
                directory: 'images/photo-personil',
                oldFileName: $photoPersonil->photo ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'pp_'
            );

            $photoPersonil->photo = $imageName;
        }

        // Menyimpan data gallery ke database
        $photoPersonil->save();

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
    public function edit(PhotoPersonil $photo_personil)
    {
        $nomorOptions = [];
        for ($i = 1; $i <= 25; $i++) {
            $nomorOptions[$i] = (string) $i;
        }

        $groupnameOption = Referensi::where('jenis', 'GroupPersonil')->pluck('data', 'data')->toArray();
        $personilSekolah = PersonilSekolah::where('aktif', 'Aktif')->orderBy('namalengkap', 'asc')->pluck('namalengkap', 'id_personil')->toArray();
        return view('pages.website.photo-personil-form', [
            'data' => $photo_personil,
            'groupnameOption' => $groupnameOption,
            'personilSekolah' => $personilSekolah,
            'nomorOptions' => $nomorOptions,
            'action' => route('websiteapp.photo-personil.update', $photo_personil->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoPersonilRequest $request, PhotoPersonil $photo_personil)
    {
        // Validasi gambar jika diunggah
        $this->validate($request, [
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:256000',
        ]);

        if ($request->hasFile('photo')) {
            $imageFile = $request->file('photo');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('photo'),
                directory: 'images/photo-personil',
                oldFileName: $photo_personil->photo ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'pp_'
            );

            $photo_personil->photo = $imageName;
        }

        // Simpan data lainnya ke dalam instance galery tanpa field `image`
        $photo_personil->fill($request->except(['photo']));
        $photo_personil->save();

        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoPersonil $photo_personil)
    {
        if ($photo_personil->image) {
            $imagePath = base_path('images/photo-personil/' . $photo_personil->image);

            // Periksa dan hapus file image
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Hapus data dari database
        $photo_personil->delete();

        return responseSuccessDelete();
    }
}
