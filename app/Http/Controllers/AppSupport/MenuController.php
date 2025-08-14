<?php

namespace App\Http\Controllers\AppSupport;

use App\DataTables\AppSupport\MenuDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppSupport\MenuRequest;
use App\Models\AppSupport\Menu;
use App\Models\Permission;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Mavinoo\Batch\BatchFacade;

class MenuController extends Controller
{
    public function __construct(private MenuRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(MenuDataTable $menuDataTable)
    {
        $this->authorize('read appsupport/menu');
        $menus = Menu::with('subMenus')->whereNull('main_menu_id')
            ->active()
            ->orderBy('orders')
            ->get()->groupBy('category');
        return $menuDataTable->render('pages.appsupport.menu', []);
    }

    public function sort()
    {
        $menus = $this->repository->getMenus();

        $data = [];
        $i = 0;
        foreach ($menus as $mm) {
            $i++;
            $data[] = ['id' => $mm->id, 'orders' => $i];

            foreach ($mm->subMenus as $sm) {
                $i++;
                $data[] = ['id' => $sm->id, 'orders' => $i];

                // Loop through ChildSubMenu (csm) within each SubMenu (sm)
                foreach ($sm->subMenus as $csm) { // Assuming 'subMenus' is the relationship name for ChildSubMenus
                    $i++;
                    $data[] = ['id' => $csm->id, 'orders' => $i];

                    // If you have a further nested level (e.g., submenus within csm), you can extend this here
                    foreach ($csm->subMenus as $ccsm) { // Further nested submenu (if applicable)
                        $i++;
                        $data[] = ['id' => $ccsm->id, 'orders' => $i];
                    }
                }
            }
        }

        Cache::forget('menus');

        BatchFacade::update(new Menu(), $data, 'id');
        responseSuccess(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Menu $menu)
    {
        return view('pages.appsupport.menu-form', [
            'action' => route('appsupport.menu.store'),
            'data' => $menu,
            'mainMenus' => $this->repository->getMainMenus(),
            'subMenus' => $this->repository->getAllSubMenus(),
            'isSubSubMenu' => false,
            'menuPermissions' => [],
        ]);
    }

    private function fillData(MenuRequest $request, Menu $menu)
    {
        $menu->fill($request->validated());
        $menu->fill([
            'orders' => $request->orders,
            'icon' => $request->icon,
            'category' => $request->category,
        ]);

        if ($request->level_menu === 'sub_sub_menu') {
            // Ambil main menu id dari sub menu yang dipilih
            $subMenu = Menu::findOrFail($request->sub_menu);
            $menu->main_menu_id = $subMenu->main_menu_id;
        } elseif ($request->level_menu === 'sub_menu') {
            $menu->main_menu_id = $request->main_menu;
        } else {
            $menu->main_menu_id = null;
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request, Menu $menu)
    {
        DB::beginTransaction();
        try {
            $this->authorize('create appsupport/menu');

            // Simpan menu dulu
            $this->fillData($request, $menu);
            $menu->save();

            // Buat atau ambil permission, lalu attach ke menu
            $permissionIds = collect($request->permissions ?? [])
                ->map(function ($permission) use ($menu) {
                    $name = "{$permission} {$menu->url}";
                    return Permission::firstOrCreate(['name' => $name])->id;
                })
                ->toArray();

            // Sinkronisasi relasi permission tanpa hapus existing
            $menu->permissions()->syncWithoutDetaching($permissionIds);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return responseError($th);
        }

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $this->authorize('update appsupport/menu');

        $isSubSubMenu = false;
        $subMenuId = null;

        if ($menu->main_menu_id) {
            $parts = explode('/', $menu->url);
            if (count($parts) > 2) {
                $isSubSubMenu = true;

                $parentUrl = implode('/', array_slice($parts, 0, 2));
                $subMenu = Menu::where('url', $parentUrl)->first();
                if ($subMenu) {
                    $subMenuId = $subMenu->id;
                }
            }
        }

        $menu->id_sub_menu = $subMenuId;

        $menuPermissions = $menu->permissions
            ->pluck('name')
            ->map(function ($name) {
                // Ambil kata pertama sebelum spasi
                return explode(' ', $name)[0];
            })
            ->toArray();

        return view('pages.appsupport.menu-form', [
            'action' => route('appsupport.menu.update', $menu->id),
            'data' => $menu,
            'mainMenus' => $this->repository->getMainMenus(),
            'subMenus' => $this->repository->getAllSubMenus(),
            'isSubSubMenu' => $isSubSubMenu,
            'menuPermissions' => $menuPermissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        DB::beginTransaction();
        try {
            $this->authorize('update appsupport/menu');

            // Isi data menu
            $this->fillData($request, $menu);
            $menu->save();

            // Siapkan permission IDs dari input
            $permissionIds = collect($request->permissions ?? [])
                ->map(function ($permission) use ($menu) {
                    $name = "{$permission} {$menu->url}";
                    return Permission::firstOrCreate(['name' => $name])->id;
                })
                ->toArray();

            // Sinkronisasi permission
            $menu->permissions()->sync($permissionIds);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return responseError($th);
        }

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
