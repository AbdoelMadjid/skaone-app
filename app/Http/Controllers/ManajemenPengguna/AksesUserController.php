<?php

namespace App\Http\Controllers\ManajemenPengguna;

use App\DataTables\ManajemenPengguna\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class AksesUserController extends Controller
{
    public function __construct(protected MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('pages.manajemenpengguna.akses-user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.manajemenpengguna.akses-user-form', [
            'data' => $user,
            'action' => route('manajemenpengguna.akses-user.update', $user->id),
            'users' => User::where('id', '!=', $user->id)->get()->pluck('name', 'id'),
            'menus' => $this->menuRepository->getMainMenuWithPermissions()
        ]);
    }

    public function getPermissionsByUser(User $user)
    {
        return view('pages.manajemenpengguna.akses-user-items', [
            'data' => $user,
            'menus' => $this->menuRepository->getMainMenuWithPermissions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);

        return responseSuccess(true);
    }
}
