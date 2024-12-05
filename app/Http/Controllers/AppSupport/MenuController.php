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
            'mainMenus' => $this->repository->getMainMenus()
        ]);
    }

    private function fillData(MenuRequest $request, Menu $menu)
    {
        $menu->fill($request->validated());
        $menu->fill([
            'orders' => $request->orders,
            'icon' => $request->icon,
            'category' => $request->category,
            'main_menu_id' => $request->main_menu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request, Menu $menu)
    {
        DB::beginTransaction();
        try {
            $this->authorize('create appsupport/menu');

            $this->fillData($request, $menu);
            $menu->save();

            foreach ($request->permissions ?? [] as $permission) {
                Permission::create(['name' => $permission . " {$menu->url}"])->menus()->attach($menu);
            }
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

        return view('pages.appsupport.menu-form', [
            'action' => route('appsupport.menu.update', $menu->id),
            'data' => $menu,
            'mainMenus' => $this->repository->getMainMenus()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $this->authorize('update appsupport/menu');

        $this->fillData($request, $menu);
        if ($request->level_menu == 'main_menu') {
            $menu->main_menu_id = null;
        }
        $menu->save();

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
