<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioServicio;
use App\Servicio;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Facades\Redirect;
use Zizaco\Entrust\EntrustFacade as Entrust;
use DB;
use App\Cliente;

class UsuarioServicioController extends Controller
{

    public function __construct(){
        
    } 

    public function index(Request $request)
    { 

        if ($request) {

        if(Entrust::hasRole('admin')){
        $usuarioServicio = DB::table('usuarioservicios as us')
        ->join('users as u','u.id','=','us.idUser')
        ->join('servicios as s','s.idServicio','=','us.idServicio')
        ->select('us.idUsuarioServicios','us.idUser','us.created_at','us.estadoSolicitud','s.idServicio','us.costoTotal','u.nombres','u.apellidos','s.nombre')
        ->groupBy('us.idUsuarioServicios','us.idUser','us.created_at','us.estadoSolicitud','s.idServicio','us.costoTotal','u.nombres','u.apellidos','s.nombre')
        ->orderBy('us.idUsuarioServicios','desc')
        ->paginate(8); 
        
        return view('vendor.admin.usuarioServicios.index', ['usuarioServicio'=>$usuarioServicio]);   
         
        }else if(Entrust::hasRole('cliente')){

            $usuarioServicio = DB::table('usuarioservicios as us')
            ->join('servicios as s','us.idServicio','=','s.idServicio')
            ->select('us.idUsuarioServicios','us.created_at','us.idUser','us.estadoSolicitud','s.nombre','s.idServicio','us.costoTotal')
            ->where('us.idUser','=', Auth::user()->id)
            ->orderBy('us.idUsuarioServicios','desc')
            ->paginate(8); 

            return view('vendor.cliente.usuarioServicios.index', ['usuarioServicio'=>$usuarioServicio]);
        
        }else{

            return view('vendor.adminlte.auth.login');
        }

        }

    }

    public function create()
    {
        
        return view("vendor.admin.servicios.create");

    }

    
    public function store($idServicio)
    { 
       $servicio = Servicio::find($idServicio);

        $usuarioServicio = new UsuarioServicio();
        $usuarioServicio->idServicio= $idServicio;
        $usuarioServicio->idUser= Auth::user()->id;
        $usuarioServicio->costoTotal= $servicio->precio;
        $usuarioServicio->estadoSolicitud = "Pendiente"; 

        $usuarioServicio->save();
    
        Alert::success('¡Correcto!', 'Tu solicitud ha sido enviada satisfactoriamente, 
        en los proximos días nuestro personal se contactará contigo')->persistent("Listo");

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

    public function mostrar(UsuarioServicio $servicio){
 

$idCliente = $servicio->idUser;
$idServicio = $servicio->idServicio;
 
$cliente = Cliente::find($idCliente);
$servicios = Servicio::find($idServicio);
 

return view('vendor.admin.usuarioServicios.show',compact('servicio','servicios','cliente'));
 
    }

    public function atender($id){

        $servicio=UsuarioServicio::findOrFail($id);

        if($servicio->estadoSolicitud == "Pendiente"){
            $servicio->estadoSolicitud = "Atendido";
   
            $servicio->update();

            Alert::success('¡Correcto!', 'La solicitud ha sido atendida correctamente')->autoclose(4000);
    
            return Redirect::to('usuarioServicio/index');
        }else if($servicio->estadoSolicitud == 'Rechazado'){
            Alert::warning('¡Información!', 'Las solicitud rechazadas no se pueden atender')->autoclose(4000);
            return Redirect::to('usuarioServicio/index');
        }else{
            Alert::info('¡Información!', 'Ya atendiste esta solicitud')->autoclose(4000);
    
            return Redirect::to('usuarioServicio/index');   
        }
    }

    public function cancelar($id)
    {
        $servicio=UsuarioServicio::findOrFail($id);

        if($servicio->estadoSolicitud == 'Rechazado'){
            Alert::info('¡Información!', 'La solicitud del servicio ya fue rechazada')->autoclose(4000);
            return Redirect::to('usuarioServicio/index');
        }else if($servicio->estadoSolicitud == 'Atendido'){
            Alert::warning('Información!', 'Las solicitud atendidas no se pueden rechazar')->autoclose(4000);
            return Redirect::to('usuarioServicio/index');
        }else{

            $servicio->estadoSolicitud = "Rechazado";   
            $servicio->update();
            Alert::success('¡Correcto!', 'La solicitud del servicio ha sido rechazado satisfactoriamente')->autoclose(4000);
            return Redirect::to('usuarioServicio/index');
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
 
       Alert::success('¡Correcto!', 'El servicio ha sido modificado satisfactoriamente')->autoclose(4000);

        $servicio->update();

        //$productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);

        //return view('vendor.admin.productos.index', ['productos'=>$productos]);
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
