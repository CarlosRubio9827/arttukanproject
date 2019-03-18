<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new Role();
        $owner->name         = 'cliente';
        $owner->display_name = 'Cliente del Sistema'; // optional
        $owner->description  = 'Este usuario es un cliente del sistema'; // optional
        $owner->save();
        
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Usuario Administrador'; // optional
        $admin->description  = 'Este usuario puede editar otros usuarios'; // optional
        $admin->save();
         
    }
}
