<?php

namespace App\Traits;

use App\Models\AppSupport\Menu;
use App\Models\Permission;

trait HasMenuPermission
{
    public function attachMenupermission(Menu $menu, array|null $permissions, array|null $roles)
    {
        if (!is_array($permissions)) {
            $permissions = ['create', 'read', 'update', 'delete'];
        }

        foreach ($permissions as $item) {
            $permission = Permission::firstOrCreate(
                [
                    'name'       => $item . " {$menu->url}",
                    'guard_name' => 'web'
                ]
            );

            // Pastikan menu terhubung
            if (!$permission->menus->contains($menu->id)) {
                $permission->menus()->attach($menu);
            }

            // Pastikan role terhubung
            if ($roles) {
                foreach ((array)$roles as $role) {
                    if (!$permission->roles->contains($role)) {
                        $permission->assignRole($role);
                    }
                }
            }
        }
    }
}
