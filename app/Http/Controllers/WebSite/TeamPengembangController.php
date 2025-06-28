<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\TeamPengembangDataTable;
use App\Helpers\ImageHelper;
use App\Models\WebSite\TeamPengembang;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\TeamPengembangRequest;
use App\Models\AppSupport\Referensi;


class TeamPengembangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TeamPengembangDataTable $teamPengembangDataTable)
    {
        // Handle the team pengembang section
        return $teamPengembangDataTable->render('pages.website.team-pengembang');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatanTeam = Referensi::where('jenis', 'JabatanTeam')->pluck('data', 'data')->toArray();
        return view('pages.website.team-pengembang-form', [
            'data' => new TeamPengembang(),
            'jabatanTeam' => $jabatanTeam,
            'action' => route('websiteapp.team-pengembang.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamPengembangRequest $request)
    {
        $teamPengembang = new TeamPengembang($request->except(['photo']));

        if ($request->hasFile('photo')) {
            $imageFile = $request->file('photo');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('photo'),
                directory: 'images/team',
                oldFileName: $teamPengembang->photo ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'team_'
            );

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
        return view('pages.website.team-pengembang-form', [
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
        return view('pages.website.team-pengembang-form', [
            'data' => $teamPengembang,
            'jabatanTeam' => $jabatanTeam,
            'action' => route('websiteapp.team-pengembang.update', $teamPengembang->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamPengembangRequest $request, TeamPengembang $teamPengembang)
    {
        if ($request->hasFile('photo')) {
            $imageFile = $request->file('photo');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('photo'),
                directory: 'images/team',
                oldFileName: $teamPengembang->photo ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'team_'
            );

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

        if ($teamPengembang->image) {
            $imagePath = base_path('images/team/' . $teamPengembang->image);
            // Periksa dan hapus file image
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $teamPengembang->delete();

        return responseSuccessDelete();
    }
}
