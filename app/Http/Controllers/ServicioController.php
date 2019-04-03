<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;

use App\Http\Requests;

use App\Http\Requests\ServicioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Zizaco\Entrust\EntrustFacade as Entrust;
use Spatie\Permission\Traits\HasRoles;
use Alert;
use Barryvdh\DomPDF\Facade as PDF;


class ServicioController extends Controller
{
    public function __construct(){

    } 

    public function index(Request $request)
    { 

        if ($request) {
        
        $servicios = DB::table('servicios as s')
        ->select('s.idServicio','s.codigo','s.descripcion','s.precio','s.nombre','s.imagen')
        ->where('s.estado','=','1')
        ->orderBy('s.idServicio','desc')
        ->paginate(8); 

        if(Entrust::hasRole('admin')){

            return view('vendor.admin.servicios.index', ['servicios'=>$servicios]);   
         
        }else if(Entrust::hasRole('cliente')){
            return view('vendor.cliente.servicios.index', ['servicios'=>$servicios]);
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
        
        return view("vendor.admin.servicios.create");

    }

    
    public function store(ServicioRequest $request)
    { 
        
        $servicio = new Servicio();
        $servicio->codigo = $request->get('codigo');
        $servicio->nombre = $request->get('nombre');
        $servicio->descripcion = $request->get('descripcion');
        $servicio->precio = $request->get('precio');
        $servicio->estado = '1';
 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images',$name);
            $servicio->imagen = $name;
        }else{
            $servicio->imagen = "sin imagen";
        }
        
        $servicio->save();

        Alert::success('¡Correcto!', 'El servicio ha sido registrado satisfactoriamente')->autoclose(4000);

        return Redirect::to('servicios');

            }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        if (Entrust::hasRole('admin')) {
            return view("vendor.admin.servicios.show", compact('servicio'));
        } else if(Entrust::hasRole('cliente')){
            return view('vendor.cliente.servicios.show', compact('servicio'));
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
    public function edit($idServicio)
    {

        $servicio=Servicio::findOrFail($idServicio);


        return view ('vendor.admin.servicios.edit',['servicio'=>$servicio]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioRequest $request, $idServicio)
    {
        $servicio = Servicio::findOrFail($idServicio);
        
        $servicio->codigo = $request->get('codigo');
        $servicio->nombre = $request->get('nombre');
        $servicio->descripcion = $request->get('descripcion');
        $servicio->precio = $request->get('precio');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images',$name); 
            $servicio->imagen = $name;
       }else{
           $servicio->imagen = "Servicio sin imagen";
       }
       Alert::success('¡Correcto!', 'El servicio ha sido modificado satisfactoriamente')->autoclose(4000);

        $servicio->update();

        //$productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);

        //return view('vendor.admin.productos.index', ['productos'=>$productos]);
        return Redirect::to('servicios');

 }

 public function destroy($id)
 {
     $servicio=Servicio::findOrFail($id);
     $servicio->estado = '2';
     $servicio->update();
  
     Alert::success('¡Correcto!', 'El servicio ha sido eliminado satisfactoriamente')->autoclose(4000);

     return Redirect::to('servicios');
 }

 public function exportarPdf()
 {
    $servicios = DB::table('servicios as s')
    ->select('s.idServicio','s.codigo','s.descripcion','s.precio','s.nombre','s.imagen')
    ->where('s.estado','=','1');
    $servicios = $servicios->get();
     $pdf = PDF::loadView( "vendor.admin.servicios.servicios-pdf",compact('servicios'));
     return $pdf->download('Listado Servicios.pdf');

 }

}
