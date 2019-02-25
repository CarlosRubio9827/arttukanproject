<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VentaRequest;
use App\Venta;
use App\DetalleVenta;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {

            if ($request) {
                $ventas = DB::table('ventas as v')->where('estado','=','A')
                ->join('detalleventas as dv', 'v.idVenta','=','dv.idVenta')
                ->select('v.idVenta','v.fechaHora','v.estado','v.totalVenta')
                ->orderBy('v.idVenta','desc')
                ->groupBy('v.idVenta','v.fechaHora','v.estado','v.totalVenta')
                ->paginate(8);
                return view('vendor.admin.ventas.index',['ventas' =>$ventas]);
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
       ->select(DB::raw('CONCAT(p.idProducto," ",p.nombreProducto) as producto'),'p.idProducto','p.stock','p.precio')
       ->where('p.stock','>','0')
       ->groupBy('producto','p.idProducto','p.stock','p.precio')
       ->get();
 

       return view('vendor.admin.ventas.create',['productos'=>$productos]);

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

        return redirect()->route('ventas.index');

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
        ->select('v.idVenta','v.fechaHora','v.totalVenta','v.estado','v.totalVenta')
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
        return Redirect::to('ventas');
    }
}
