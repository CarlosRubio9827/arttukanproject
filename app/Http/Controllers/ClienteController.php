<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\Http\Requests;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

class ClienteController extends Controller
{
    
    public function __construct(){

    } 
                 
    public function index(Request $request)
    { 

        if ($request) {
        
        $clientes = DB::table('users as u')
        ->join('role_user as r','u.id','=','r.user_id')
        ->where('role_id','=','2')
        ->select('u.nombres','u.apellidos','u.email','u.telefono','u.numDocumento','u.id')
        ->orderBy('u.id','desc')
        ->paginate(8);


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
  
        return redirect()->route('clientes.index');
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
    public function edit($idProducto)
    {
        $producto=Producto::findOrFail($idProducto);
        $tipoproductos = DB::select('select * from tipoproductos where condicion = :id', ['id' => 1]); 
        

        return view ('vendor.admin.productos.edit',['producto'=>$producto,'tipoProductos'=>$tipoproductos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $idProducto)
    {
        $producto = Producto::findOrFail($idProducto);
        $producto->codigoProducto=$request->get('codigoProducto');
        
        $producto->nombreProducto = $request->get('nombreProducto');
        $producto->stock = $request->get('stock');
        $producto->idTipoProducto = $request->get('idTipoProducto');

        if ($request->hasFile('image')) {
              $file = $request->file('image');
              $name = time().$file->getClientOriginalName();
              $file->move(public_path().'/images',$name); 
              $producto->imagen = $name;
         }
       
        $producto->update();

         $productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);
        return view('vendor.admin.productos.index', ['productos'=>$productos]);
        
     
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProducto)
    {
        $producto = Producto::findOrFail($idProducto);
        $producto->estado =2;
        $producto->update(); 

        $productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);
        //return view('vendor.admin.productos.index', ['productos'=>$productos]);
        

        return Redirect::to('productos')->with('message', 'Eliminado satisfactoriamente');
        //redirect()->route('vendor.admin.productos.index')->with("info", "Se ha elimnado correctamente");
    }

}
