<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Http\Requests;
use App\Http\Requests\ClienteRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Request;
use DB;
use Illuminate\Support\Facades\Event;

/**
 * Class RegisterController
 * @package %%NAMESPACE%%\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('vendor.adminlte.auth.register');
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required',
        ]);
    } 

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  request  $data
     * @return User
     */
    protected function create(array $request)
    { 

            $cliente = new User();
        
            $cliente->nombres = $request['nombres'];
            $cliente->apellidos = $request['apellidos'];
            $cliente->email = $request['email'];
            $cliente->tipoDocumento = $request['tipoDocumento'];
            $cliente->numDocumento = $request['numDocumento'];
            $cliente->telefono = $request['telefono'];
            $cliente->direccion = $request['direccion'];
            $cliente->password = bcrypt($request['password']);
            $cliente->estado = '1';
            
            $cliente->save();
            $idCliente=$cliente->id;
     
            DB::table('role_user')->insert(
                ['user_id' => $idCliente, 'role_id' => 2]
            ); 
      
       
            return $cliente;
  
          }
 
}
 