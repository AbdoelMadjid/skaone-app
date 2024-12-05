<?php

namespace App\Http\Controllers\About;

use App\DataTables\About\TeamPengembangDataTable;
use App\Models\About\TeamPengembang;
use App\Http\Controllers\Controller;
use App\Http\Requests\About\TeamPengembangRequest;
use App\Models\AppSupport\Referensi;
use Intervention\Image\ImageManagerStatic as Image;


class TeamPengembangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TeamPengembangDataTable $teamPengembangDataTable)
    {
        // Handle the team pengembang section
        return $teamPengembangDataTable->render('pages.about.team-pengembang');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatanTeam = Referensi::where('jenis', 'JabatanTeam')->pluck('data', 'data')->toArray();
        return view('pages.about.team-pengembang-form', [
            'data' => new TeamPengembang(),
            'jabatanTeam' => $jabatanTeam,
            'action' => route('about.team-pengembang.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamPengembangRequest $request)
    {
        $teamPengembang = new TeamPengembang($request->except(['photo']));

        if ($request->hasFile('photo')) {
            // Upload dan proses file gambar
            $image = $request->file('photo');
            $imageName = 'team_' . time() . '.' . $image->extension();

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
            $destinationPath = public_path('images/team');
            $image->move($destinationPath, $imageName);

            // Menyimpan nama file ke database
            $teamPengembang->photo = $imageName;
        }

        $teamPengembang->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamPengembang $teamPengembang)
    {
        $jabatanTeam = Referensi::where('jenis', 'JabatanTeam')->pluck('data', 'data')->toArray();
        return view('pages.about.team-pengembang-form', [
            'data' => $teamPengembang,
            'jabatanTeam' => $jabatanTeam,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamPengembang $teamPengembang)
    {
        $jabatanTeam = Referensi::where('jenis', 'JabatanTeam')->pluck('data', 'data')->toArray();
        return view('pages.about.team-pengembang-form', [
            'data' => $teamPengembang,
            'jabatanTeam' => $jabatanTeam,
            'action' => route('about.team-pengembang.update', $teamPengembang->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamPengembangRequest $request, TeamPengembang $teamPengembang)
    {
        if ($request->hasFile('photo')) {
            // Hapus gambar dan thumbnail lama jika ada
            if ($teamPengembang->photo) {
                $oldImagePath = public_path('images/team/' . $teamPengembang->photo);
                $oldThumbnailPath = public_path('images/thumbnail/' . $teamPengembang->photo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload gambar baru dan buat thumbnail
            $imageFile = $request->file('photo');
            $imageName = 'team_' . time() . '.' . $imageFile->extension();

            // Buat dan simpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = public_path('images/thumbnail');
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
            $destinationPath = public_path('images/team');
            $imageFile->move($destinationPath, $imageName);

            // Perbarui nama file gambar di database
            $teamPengembang->photo = $imageName;
        }

        $teamPengembang->fill($request->except(['photo']));
        $teamPengembang->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamPengembang $teamPengembang)
    {
        $teamPengembang->delete();

        return responseSuccessDelete();
    }
}
