<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;

class AssignPermissionToRole extends Command
{
    protected $signature = 'permission:add
                            {role : Nama role, contoh: panitiapkl}
                            {path : Path permission tanpa crud, contoh: panitiaprakerin/administrasi/negosiator}';

    protected $description = 'Menambahkan permission create, read, update, delete ke role berdasarkan path tertentu';

    public function handle()
    {
        $roleName = $this->argument('role');
        $path = $this->argument('path');

        $role = Role::where('name', $roleName)->first();
        if (!$role) {
            $this->error("Role '{$roleName}' tidak ditemukan.");
            return 1;
        }

        $crudPermissions = ['create', 'read', 'update', 'delete'];
        $countAssigned = 0;

        foreach ($crudPermissions as $crud) {
            $permissionName = "{$crud} {$path}";
            $permission = Permission::firstOrCreate(['name' => $permissionName]);

            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
                $this->info("✓ Permission '{$permissionName}' diberikan ke role '{$roleName}'.");
                $countAssigned++;
            } else {
                $this->line("• Permission '{$permissionName}' sudah ada pada role '{$roleName}'.");
            }
        }

        $this->info("Selesai. Total {$countAssigned} permission ditambahkan.");
        return 0;
    }
}
