<?php

namespace App\Http\Controllers\ManajemenPengguna;

use App\DataTables\ManajemenPengguna\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenPengguna\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('pages.manajemenpengguna.role');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.manajemenpengguna.role-form', [
            'data' => new Role(),
            'action' => route('manajemenpengguna.roles.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = new Role($request->validated());
        $role->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('pages.manajemenpengguna.role-form', [
            'data' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('pages.manajemenpengguna.role-form', [
            'data' => $role,
            'action' => route('manajemenpengguna.roles.update', $role->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->fill($request->validated());
        $role->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return responseSuccessDelete();
    }
}
