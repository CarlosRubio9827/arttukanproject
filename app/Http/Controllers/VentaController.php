<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Venta;
use App\DetalleVenta;
use DB;
use Carbon\Carbon;
use Response;

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
                $ventas = DB::table('ventas as v')->join('detalleventas as dv', 'v.idVenta','=','dv.idVenta')->select('v.idVenta','v.fechaHora','v.totalVenta')->orderBy('v.idVenta','desc')->groupBy('v.idVenta','v.fechaHora');
                return view('ventas.index',['ventas' =>$ventas]);
            }

            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $productos = DB::table('productos')->get();
       return view('ventas.create',['productos'=>$productos]);
        } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
           try {
                DB::beginTransaction();
                $venta=new Venta;
                $venta->totalVenta=$request->get('totalVenta');
                $venta->impuesto=$request->get('impuesto');
                $mytime = Carbon::now('America/Bogota');
                $venta->fechaHora=$mytime->toDateTimeString();
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

           return redirect('ventas.index');

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta=DB::table('ventas as v')->join('detalleventas as dv','v.idVenta','=','dv.idVenta')->select('v.idVenta','v.fechaHora','v.totalVenta')->where('v.idVenta','=',$id)->first();

        $detalle=DB::table('detalleventas as d')->join('productos as p','d.idProducto','=','p.idProducto')->select('p.nombreProducto','d.cantidad','a.precioVenta')->where('d.idVenta','=',$id)->get();
        return view ('ventas.show',['ventas'=>$venta,'detalleVentas'=>$detalle]);
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
        $venta->delete();
        return redirect()->route('productos.index')->with("info", "Se ha elimnado correctamente");
    }
}
