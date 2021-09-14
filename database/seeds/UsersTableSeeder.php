<?php

use Illuminate\Database\Seeder;
use PedidosLaravelVue\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
          'name' => 'administrador',
          'last_name' => 'administrador',
          'email' => 'administrador@gmail.com',
          'password' => bcrypt('administrador')
        ]);

        $superadmin->assignRole('super-admin');
    }
}
