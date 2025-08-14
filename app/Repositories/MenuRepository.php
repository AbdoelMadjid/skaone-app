<?php

namespace App\Repositories;

use App\Models\AppSupport\Menu;

class MenuRepository
{
    public function getMainMenuWithPermissions()
    {
        return Menu::with('permissions', 'subMenus.permissions')->whereNull('main_menu_id')->get();
    }

    public function getMainMenus()
    {
        return Menu::whereNull('main_menu_id')
            ->select('id', 'name')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => "{$item->id} - {$item->name}"];
            });
    }

    public function getMenus()
    {
        return Menu::active()->with(['subMenus' => function ($query) {
            $query->orderBy('orders');
        }])->whereNull('main_menu_id')
            ->orderBy('orders')
            ->get();
    }

    public function getAllSubMenus()
    {
        return Menu::whereNotNull('main_menu_id')
            ->select('id', 'name', 'main_menu_id')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->id => "{$item->id} - {$item->name}"];
            });
    }
}
