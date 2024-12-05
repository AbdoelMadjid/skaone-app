<?php

namespace App\Traits;

use App\Models\AppSupport\Menu;
use App\Models\Permission;

trait HasMenuPermission
{
    public function attachMenupermission(Menu $menu, array | null $permissions, array | null $roles)
    {
        /**
         * @var Permission $permission
         */

        if (!is_array($permissions)) {
            $permissions = ['create', 'read', 'update', 'delete'];
        };

        foreach ($permissions as $item) {
            $permission = Permission::create(['name' => $item . " {$menu->url}"]);
            $permission->menus()->attach($menu);
            if ($roles) {
                $permission->assignRole($roles);
            }
        }
    }
}
