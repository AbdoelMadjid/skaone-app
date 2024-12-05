<?php

namespace App\Http\Controllers\AppSupport;

use App\DataTables\AppSupport\AppProfilDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppSupport\AppProfilRequest;
use App\Models\AppSupport\AppProfil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AppProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AppProfilDataTable $appProfilDataTable)
    {
        return $appProfilDataTable->render('pages.appsupport.app-profil');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.appsupport.app-profil-form', [
            'data' => new AppProfil(),
            'action' => route('appsupport.app-profil.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppProfilRequest $request)
    {
        $appProfil = new AppProfil($request->except(['app_icon', 'app_logo']));

        // Check if a new icon is uploaded
        if ($request->hasFile('app_icon')) {
            // Delete the old icon if it exists
            if ($appProfil->app_icon) {
                $oldIconPath = base_path('images/' . $appProfil->app_icon);
                if (file_exists($oldIconPath)) {
                    unlink($oldIconPath);
                }
            }
            // Upload the new icon
            $appIconFile = $request->file('app_icon');
            $appIconName = time() . '_' . $appIconFile->getClientOriginalName();
            $appIconFile->move(base_path('images'), $appIconName);
            $appProfil->app_icon = $appIconName;
        }

        /* if ($request->hasFile('app_icon')) {
            $appProfil->app_icon = $request->file('app_icon')->store('build/images', 'public');
        } */


        // Check if a new icon is uploaded
        if ($request->hasFile('app_logo')) {
            // Delete the old icon if it exists
            if ($appProfil->app_logo) {
                $oldLogoPath = base_path('images/' . $appProfil->app_logo);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
            // Upload the new icon
            $appLogoFile = $request->file('app_logo');
            $appLogoName = time() . '_' . $appLogoFile->getClientOriginalName();
            $appLogoFile->move(base_path('images'), $appLogoName);
            $appProfil->app_logo = $appLogoName;
        }

        /* if ($request->hasFile('app_logo')) {
            $appProfil->app_logo = $request->file('app_logo')->store('build/images', 'public');
        } */

        $appProfil->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(AppProfil $appProfil)
    {
        return view('pages.appsupport.app-profil-form', [
            'data' => $appProfil,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppProfil $appProfil)
    {
        return view('pages.appsupport.app-profil-form', [
            'data' => $appProfil,
            'action' => route('appsupport.app-profil.update', $appProfil->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppProfilRequest $request, AppProfil $appProfil)
    {
        // Check if a new icon is uploaded
        if ($request->hasFile('app_icon')) {
            // Delete the old icon if it exists
            if ($appProfil->app_icon) {
                $oldIconPath = base_path('images/' . $appProfil->app_icon);
                if (file_exists($oldIconPath)) {
                    unlink($oldIconPath);
                }
            }
            // Upload the new icon
            $appIconFile = $request->file('app_icon');
            $appIconName = time() . '_' . $appIconFile->getClientOriginalName();
            $appIconFile->move(base_path('images'), $appIconName);
            $appProfil->app_icon = $appIconName;
        }

        // Check if a new logo is uploaded
        if ($request->hasFile('app_logo')) {
            // Delete the old logo if it exists
            if ($appProfil->app_logo) {
                $oldLogoPath = base_path('images/' . $appProfil->app_logo);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
            // Upload the new logo
            $appLogoFile = $request->file('app_logo');
            $appLogoName = time() . '_' . $appLogoFile->getClientOriginalName();
            $appLogoFile->move(base_path('images'), $appLogoName);
            $appProfil->app_logo = $appLogoName;
        }

        // Update the remaining fields
        $appProfil->fill($request->except(['app_icon', 'app_logo']));
        $appProfil->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppProfil $appProfil)
    {
        $appProfil->delete();

        return responseSuccessDelete();
    }
}
