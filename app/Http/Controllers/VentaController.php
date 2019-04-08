<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\USer;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VentaRequest;
use App\Venta;
use App\DetalleVenta;
use DB;
use Carbon\Carbon;
use Zizaco\Entrust\EntrustFacade as Entrust;
use Spatie\Permission\Traits\HasRoles;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Auth\Events\Login;
use Alert;
use Barryvdh\DomPDF\Facade as PDF;


class VentaController extends Controller
{
    public function index(Request $request)
{  
 
        if(Entrust::hasRole('admin')){
            $ventas = DB::table('ventas as v')
            ->where('v.estado','=','A')
            ->join('detalleventas as dv', 'v.idVenta','=','dv.idVenta')
            ->join('users as u','v.idCliente','=','u.id')
            ->select('v.idVenta','v.fechaHora','v.estado','v.totalVenta','v.idCliente','u.nombres','u.apellidos')
            ->orderBy('v.idVenta','desc')
            ->groupBy('v.idVenta','v.fechaHora','v.estado','v.totalVenta','v.idCliente','u.nombres','u.apellidos')
            ->paginate(8); 
        
            return view('vendor.admin.ventas.index',['ventas' =>$ventas]);
              
    }else if(Entrust::hasRole('cliente')){
        return view('vendor.adminlte.home')->with('message', 'Pro favor inicia sesion');
    }else{
        return view ('vendor.adminlte.welcome');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
       $productos = DB::table('productos as p')
       ->select(DB::raw('CONCAT("idProducto", "nombreProducto") as producto'),'p.idProducto','p.stock','p.precio')
       ->where('p.stock','>','0')
       ->where('p.estado','=','1')
       ->groupBy('producto','p.idProducto','p.stock','p.precio')
       ->get();

       $clientes = DB::table('users as u')
       ->join('role_user as r','u.id','=','r.user_id')
       ->where('r.role_id','=','2')
       ->select('u.id','u.nombres','u.apellidos','u.numDocumento')
       ->get();
 
 
       return view('vendor.admin.ventas.create',['productos'=>$productos, 'clientes'=>$clientes]);

        } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaRequest $request)
    {
       
           
           try {
                DB::beginTransaction();
                $venta=new Venta;
                $venta->idCliente=$request->get('idCliente');
                $venta->totalVenta=$request->get('totalVenta');
                $mytime = Carbon::now('America/Bogota');
                $venta->fechaHora=$mytime->toDateTimeString();
                $venta->estado = 'A';
                $venta->save();
               
                $idProducto=$request->get('idProducto');
                $cantidad=$request->get('cantidad');
                $precioVenta=$request->get('precioVenta');
                $cont = 0; 

                while ($cont < count($idProducto)) {
                       
                    $detalle = new DetalleVenta();
                    $detalle->idVenta=$venta->idVenta;
                    $detalle->idProducto=$idProducto[$cont];
                       $detalle->cantidad=$cantidad[$cont];
                       $detalle->precioVenta=$precioVenta[$cont];
                       $detalle->save();

                       $cont=$cont+1;
                }

                DB::commit();
               
           } catch (Exception $e) {
                DB::rollback();
           }

        Alert::success('¡Correcto!', 'La venta ha sido registrada satisfactoriamente')->autoclose(4000);

        return Redirect::to('ventas');

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $venta=DB::table('ventas as v')
        ->join('detalleventas as dv','v.idVenta','=','dv.idVenta')
        ->join('users as u','v.idCliente','=','u.id')
        ->select('v.idVenta','v.fechaHora','v.totalVenta','v.estado','v.totalVenta','v.idCliente','u.nombres','u.apellidos','u.numDocumento')
        ->where('v.idVenta','=',$id)
        ->first();

       

        $detalle=DB::table('detalleventas as d')
        ->join('productos as p','d.idProducto','=','p.idProducto')
        ->select('p.nombreProducto','d.cantidad','d.precioVenta')
        ->where('d.idVenta','=',$id)
        ->get();
        return view ('vendor.admin.ventas.show',['ventas'=>$venta,'detalleVentas'=>$detalle]);
           
            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta=Venta::findOrFail($id);
        $venta->estado = 'C';
        $venta->update();
        Alert::info('¡Correcto!', 'La venta ha sido eliminada satisfactoriamente')->autoclose(4000);

        return Redirect::to('ventas');
    }

    public function exportarPdf()
    {
        $ventas = DB::table('ventas as v')
            ->where('v.estado','=','A')
            ->join('detalleventas as dv', 'v.idVenta','=','dv.idVenta')
            ->join('users as u','v.idCliente','=','u.id')
            ->select('v.idVenta','v.fechaHora','v.estado','v.totalVenta','v.idCliente','u.nombres','u.apellidos')
            ;
            
          $ventas= $ventas->get();  
            
 
        $pdf = PDF::loadView( "vendor.admin.ventas.ventas-pdf",compact('ventas'));
        return $pdf->download('Listado Ventas.pdf');

    }


}
