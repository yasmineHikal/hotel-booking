<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'change room status']);
        Permission::create(['name' => 'book rooms']);
        Permission::create(['name' => 'view all rooms']);
        Permission::create(['name' => 'view all requests']);
        Permission::create(['name' => 'approve request']);
        Permission::create(['name' => 'reject request']);


        // create roles and assign created permissions
        $role = Role::create(['name' => 'client']);
        $role->givePermissionTo(['book rooms','view all rooms']);

        $role = Role::create(['name' => 'employee'])
            ->givePermissionTo(['view all rooms', 'change room status','approve request','reject request','view all requests']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
