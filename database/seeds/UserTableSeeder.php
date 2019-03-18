<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role_administradorSistema = Role::where('name','administradorSistema')->first();
        $role_clienteSistema = Role::where('name','clienteSistema')->first();

        $user = new User();
        $user->nombres = "carlos rubio";
        $user->apellidos = "rubio gallego";
        $user->tipoDocumento="cedula ciudadania";
        $user->numDocumento="321321321";
        $user->email = "user@email.com";
        $user->telefono="31578782";
        $user->direccion="cr 21 #34-34";
        $user->password= bcrypt('query');
        $user->save();
        $user->roles()->attach($role_clienteSistema);

        $user = new User();
        $user->nombres = "fernadno";
        $user->apellidos = "balanta";
        $user->tipoDocumento="cedula ciudadania";
        $user->numDocumento="34343";
        $user->email = "fercho@email.com";
        $user->telefono="321312";
        $user->direccion="cr 23 #33-1";
        $user->password= bcrypt('query');
        $user->save();
        $user->roles()->attach($role_administradorSistema);

    }
}
