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
        
        $productos = DB::table('productos as p')->where('estado','=','1')
        ->join('tipoproductos as tp','p.idTipoProducto','=','tp.idTipoProducto')->select('p.idProducto','p.codigoProducto','p.precio','p.nombreProducto','p.stock','tp.nombreTipoProducto as TipoProducto','p.imagen','p.idTipoProducto')
        ->orderBy('p.idProducto','desc')->paginate(8);

        return view('vendor.admin.productos.index', ['productos'=>$productos]);    
         
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
         
         if ($request->hasFile('image')) {
              $file = $request->file('image');
              $name = time().$file->getClientOriginalName();
              $file->move(public_path().'/images',$name);
         }

        $producto = new Producto();
        $producto->codigoProducto = $request->get('codigoProducto');
        $producto->nombreProducto = $request->get('nombreProducto');
        $producto->stock = $request->get('stock');
        $producto->precio = $request->get('precioProducto');
        $producto->estado = 1;
        $producto->idTipoProducto = $request->get('idTipoProducto');
        $producto->imagen = $name;
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
        return view("vendor.admin.productos.show", compact('producto'));
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
