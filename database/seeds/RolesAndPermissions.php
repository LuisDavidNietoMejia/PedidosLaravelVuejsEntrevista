<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
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
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'store user']);
        Permission::create(['name' => 'read user']);

        Permission::create(['name' => 'edit cuenta']);
        Permission::create(['name' => 'store cuenta']);
        Permission::create(['name' => 'read cuenta']);

        Permission::create(['name' => 'store librodiario']);
        Permission::create(['name' => 'read librodiario']);
        Permission::create(['name' => 'edit librodiario']);

        Permission::create(['name' => 'read operacionactualizada']);

        // create roles and assign created permissions
        // this can be done as separate statements

        $role = Role::create(['name' => 'supervisor']);
        $role->givePermissionTo('store librodiario');
        $role->givePermissionTo('read librodiario');
        $role->givePermissionTo('edit librodiario');
        $role->givePermissionTo('read operacionactualizada');

        $role = Role::create(['name' => 'asistente']);
        $role->givePermissionTo('store librodiario');
        $role->givePermissionTo('read librodiario');

        // or may be done by chaining
        //$role = Role::create(['name' => 'moderator'])
        //->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        Role::create(['name' => 'inhabilitado']);
    }
}
