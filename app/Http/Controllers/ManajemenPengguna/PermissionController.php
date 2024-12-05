<?php

namespace App\Http\Controllers\ManajemenPengguna;

use App\DataTables\ManajemenPengguna\PermissionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenPengguna\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PermissionDataTable $permissionDataTable)
    {
        return $permissionDataTable->render('pages.manajemenpengguna.permission');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.manajemenpengguna.permission-form', [
            'data' => new Permission(),
            'action' => route('manajemenpengguna.permissions.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $permission = new Permission($request->validated());
        $permission->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('pages.manajemenpengguna.permission-form', [
            'data' => $permission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('pages.manajemenpengguna.permission-form', [
            'data' => $permission,
            'action' => route('manajemenpengguna.permissions.update', $permission->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->fill($request->validated());
        $permission->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return responseSuccessDelete();
    }
}
