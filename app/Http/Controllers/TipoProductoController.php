<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoProducto;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TipoProductoRequest;
use DB;
use Alert;
use Barryvdh\DomPDF\Facade as PDF;

class TipoProductoController extends Controller 
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

        $tipoProductos = DB::table('tipoProductos')->where('condicion','=','1')->orderBy('idTipoProducto','desc')->paginate(8);

        return view('vendor.admin.tipoProductos.index', ['tipoProductos'=>$tipoProductos]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    { 
        return view("vendor.admin.tipoProductos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoProductoRequest $request)
    {  
        $tipoProducto = new TipoProducto();
        $tipoProducto->nombreTipoProducto = $request->get('nombreTipoProducto');
        $tipoProducto->descripcionTipoProducto = $request->get('descripcionTipoProducto');
        $tipoProducto->condicion = '1';
        $tipoProducto->save();
        Alert::success('¡Correcto!', 'El producto '.$tipoProducto->nombreTipoProducto.' ha sido registrado satisfactoriamente')->autoclose(4000);

        return redirect()->route('tipoProductos.index');
        
            }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idTipoProducto)
    {
        return view("vendor.admin.tipoProductos.show", ['tipoProducto'=>TipoProducto::findOrFail($idTipoProducto)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idTipoProducto)
    {
          return view ('vendor.admin.tipoProductos.edit',['tipoProducto'=>TipoProducto::findOrFail($idTipoProducto)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoProductoRequest $request, $idTipoProducto)
    {

       
        $tipoProducto = TipoProducto::findOrFail($idTipoProducto);
        $tipoProducto->nombreTipoProducto=$request->get('nombreTipoProducto');
        $tipoProducto->descripcionTipoProducto=$request->get('descripcionTipoProducto');
       
        $tipoProducto->update();

        Alert::success('¡Correcto!', 'El producto '.$tipoProducto->nombreTipoProducto.' ha sido modificado satisfactoriamente')->autoclose(4000);

        return Redirect::to('tipoProductos');
    
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTipoProducto)
    {

        $tipoProducto = TipoProducto::findOrFail($idTipoProducto);
        $tipoProducto->condicion='0';
        $tipoProducto->update();
        Alert::info('¡Correcto!', 'El producto '.$tipoProducto->nombreTipoProducto.' ha sido eliminado satisfactoriamente')->autoclose(4000);

            return Redirect::to('tipoProductos');
    }

    public function exportarPdf()
    {
        $tipoProductos = TipoProducto::all();
 
        $pdf = PDF::loadView( "vendor.admin.tipoProductos.tiposProductos-pdf",compact('tipoProductos'));
        return $pdf->download('Listado Productos.pdf');

    }

}
