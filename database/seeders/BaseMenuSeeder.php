<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppSupport\Menu;

abstract class BaseMenuSeeder extends Seeder
{
    // Counter untuk main menu
    protected static $mainOrder = 1;

    /**
     * Buat Main Menu dengan urutan otomatis
     */
    protected function createMainMenu(array $data): Menu
    {
        $data['orders'] = self::$mainOrder++;
        return Menu::firstOrCreate(['url' => $data['url']], $data);
    }

    /**
     * Buat Sub Menu dengan urutan otomatis sesuai parent
     */
    protected function createSubMenu(Menu $parent, array $data): Menu
    {
        $nextOrder = ($parent->subMenus()->max('orders') ?? 0) + 1;
        $data['orders'] = $nextOrder;
        return $parent->subMenus()->create($data);
    }
}
