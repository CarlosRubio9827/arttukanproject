<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\TipoProducto;
use App\Http\Requests;

use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Zizaco\Entrust\EntrustFacade as Entrust;
use Spatie\Permission\Traits\HasRoles;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

    } 
                 
    public function index(Request $request)
    { 

        if ($request) {
        
        $productos = DB::table('productos as p')
        ->where('estado','=','1')
        ->join('tipoproductos as tp','p.idTipoProducto','=','tp.idTipoProducto')
        ->select('p.idProducto','p.codigoProducto','p.descripcion','p.precio','p.nombreProducto','p.stock','tp.nombreTipoProducto as tipoProducto','p.imagen','p.idTipoProducto')
        ->orderBy('p.idProducto','desc')
        ->paginate(8);

        if(Entrust::hasRole('admin')){

            return view('vendor.admin.productos.index', ['productos'=>$productos]);   
         
        }else if(Entrust::hasRole('cliente')){
            return view('vendor.cliente.productos.index', ['productos'=>$productos]);
        }else{
            return view('vendor.adminlte.auth.login');
        }

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        
        $tipoProductos=DB::table('tipoproductos')->where('condicion','=','1')->get();

        return view("vendor.admin.productos.create",['tipoProductos'=>$tipoProductos]);

    }

    
    public function store(ProductoRequest $request)
    { 
        
        $producto = new Producto();
        $producto->codigoProducto = $request->get('codigoProducto');
        $producto->nombreProducto = $request->get('nombreProducto');
        $producto->descripcion = $request->get('descripcion');
        $producto->stock = $request->get('stock');
        $producto->precio = $request->get('precioProducto');
        $producto->estado = 1;
        $producto->idTipoProducto = $request->get('idTipoProducto');
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images',$name);
            $producto->imagen = $name;
        }else{
            $producto->imagen = "sin imagen";
        }

        $producto->save();

        return redirect()->route('productos.index');
       // $productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);
        //return view('vendor.admin.productos.index', ['productos'=>$productos]);
        
          
            }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        if (Entrust::hasRole('admin')) {
            return view("vendor.admin.productos.show", compact('producto'));
        } else if(Entrust::hasRole('cliente')){
            return view('vendor.cliente.productos.show', compact('producto'));
        }else{
            return view('vendor.adminlte.auth.login');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idProducto)
    {
        $id = $idProducto->idProducto;
      
        $producto = Producto::findOrFail($id);

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
        $id = $idProducto->idProducto;


        $producto = Producto::findOrFail($id);

        $producto->codigoProducto=$request->get('codigoProducto');
        
        $producto->nombreProducto = $request->get('nombreProducto');
        $producto->stock = $request->get('stock');
        $producto->precio = $request->get('precio');
        $producto->descripcion = $request->get('descripcion');
        $producto->idTipoProducto = $request->get('idTipoProducto');

        if ($request->hasFile('image')) {
              $file = $request->file('image');
              $name = time().$file->getClientOriginalName();
              $file->move(public_path().'/images',$name); 
              $producto->imagen = $name;
         }else{
             $producto->imagen = "Producto sin imagen";
         }
       
        $producto->update();

        //$productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);

        //return view('vendor.admin.productos.index', ['productos'=>$productos]);
        return Redirect::to('productos');

     
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
