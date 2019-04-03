<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\Http\Requests;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Alert;
use Barryvdh\DomPDF\Facade as PDF;


class ClienteController extends Controller
{
    protected $redirectTo = '/login';
    
    public function __construct(){
        $this->middleware('auth');
    } 
                 
    public function index(Request $request)
    { 

        if ($request) {
        
        $clientes = DB::table('users as u')
        ->where('u.estado','=','1')
        ->join('role_user as r','u.id','=','r.user_id')
        ->where('role_id','=','2')
        ->select('u.nombres','u.apellidos','u.email','u.telefono','u.numDocumento','u.id')
        ->orderBy('u.id','desc')
        ->paginate(10);
 
        return view('vendor.admin.clientes.index', ['clientes'=>$clientes]);   
         
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        
        return view("vendor.admin.clientes.create");

    }

    
    public function store(ClienteRequest $request)
    { 
       

        $cliente = new Cliente();
        
        $cliente->nombres = $request->get('nombres');
        $cliente->apellidos = $request->get('apellidos');
        $cliente->email = $request->get('email');
        $cliente->tipoDocumento = $request->get('tipoDocumento');
        $cliente->numDocumento = $request->get('numDocumento');
        $cliente->telefono = $request->get('telefono');
        $cliente->direccion = $request->get('direccion');
        $cliente->password = bcrypt($request->get('password'));
        $cliente->estado = '1';
        
        $cliente->save();
        $idCliente=$cliente->id;
 
        DB::table('role_user')->insert(
            ['user_id' => $idCliente, 'role_id' => 2]
        ); 

        Alert::success('¡Correcto!', 'El cliente'.$cliente->nombres.' ha sido registrado satisfactoriamente')->autoclose(4000);
        return Redirect::to('clientes');
       // $productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);
        //return view('vendor.admin.productos.index', ['productos'=>$productos]);
          
            }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view("vendor.admin.clientes.show", compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idCliente)
    {
        $cliente=Cliente::findOrFail($idCliente);
        return view ('vendor.admin.clientes.edit',['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
         $cliente = Cliente::findOrFail($id);
         $cliente->nombres = $request->get('nombres');
        $cliente->apellidos = $request->get('apellidos');
        $cliente->email = $request->get('email');
        $cliente->tipoDocumento = $request->get('tipoDocumento');
        $cliente->numDocumento = $request->get('numDocumento');
        $cliente->telefono = $request->get('telefono');
        $cliente->direccion = $request->get('direccion');
        $cliente->password = bcrypt($request->get('password'));
        $cliente->estado = '1';
       
        $cliente->update();
    
        Alert::success('¡Correcto!', 'El cliente'.$cliente->nombres.' ha sido modificado satisfactoriamente')->autoclose(4000);

        return Redirect::to('clientes');
        
     
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCliente)
    {
        $cliente = Cliente::findOrFail($idCliente);
        $cliente->estado ="2";
        $cliente->update(); 

        Alert::success('¡Correcto!', 'El cliente '.$cliente->nombres.' ha sido eliminado satisfactoriamente')->autoclose(4000);
        //return view('vendor.admin.productos.index', ['productos'=>$productos]);


        return Redirect::to('clientes');
        //redirect()->route('vendor.admin.productos.index')->with("info", "Se ha elimnado correctamente");
    }

    public function exportarPdf()
    {
        $clientes = DB::table('users as u')
        ->where('u.estado','=','1')
        ->join('role_user as r','u.id','=','r.user_id')
        ->where('role_id','=','2')
        ->select('u.nombres','u.apellidos','u.email','u.telefono','u.tipoDocumento','u.numDocumento','u.id');
        
          $clientes= $clientes->get();  
            
        $pdf = PDF::loadView( "vendor.admin.clientes.clientes-pdf",compact('clientes'));
        return $pdf->download('Listado Vlientes.pdf');

    }

}
