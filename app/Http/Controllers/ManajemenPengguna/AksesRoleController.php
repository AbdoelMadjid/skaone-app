<?php

namespace App\Http\Controllers\ManajemenPengguna;

use App\DataTables\ManajemenPengguna\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Models\ManajemenPengguna\Menu;
use App\Models\Role;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class AksesRoleController extends Controller
{
    public function __construct(protected MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('pages.manajemenpengguna.akses-role');
    }

    /**
     * Show data
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $roles = Role::where('id', '!=', $role->id)->get()->pluck('name', 'id');
        return view('pages.manajemenpengguna.akses-role-form', [
            'data' => $role,
            'action' => route('manajemenpengguna.akses-role.update', $role->id),
            'menus' => $this->menuRepository->getMainMenuWithPermissions(),
            'roles' => $roles
        ]);
    }

    /**
     * getPermissionsByRole
     */
    public function getPermissionsByRole(Role $role)
    {
        return view('pages.manajemenpengguna.akses-role-items', [
            'data' => $role,
            //'menus' => $this->getMenus(),
            'menus' => $this->menuRepository->getMainMenuWithPermissions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);

        return responseSuccess(true);
    }
}
