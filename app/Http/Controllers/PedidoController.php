<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PedidoRequest;
use App\Pedido;
use App\DetallePedido;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Zizaco\Entrust\EntrustFacade as Entrust;
use Spatie\Permission\Traits\HasRoles;

class PedidoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {

        if(Entrust::hasRole('cliente')){
            $idUser = auth()->id();

            if ($request) {
                $pedidos = DB::table('pedidos as p')
                ->join('detallepedidos as dp', 'p.idPedido','=','dp.idPedido')
                ->select('p.idPedido','p.fechaHora','p.estado','p.totalPedido','p.idCliente')
                ->where('p.idCliente','=',$idUser)
                ->orderBy('p.idPedido','asc')
                ->groupBy('p.idPedido','p.fechaHora','p.estado','p.totalPedido','p.idCliente')
                ->paginate(10);
                return view('vendor.cliente.pedidos.index',['pedidos' =>$pedidos]);
            }

        }else if(Entrust::hasRole('admin')){
            if ($request) {
                $pedidos = DB::table('pedidos as p')
                ->join('detallepedidos as dp', 'p.idPedido','=','dp.idPedido')
                ->select('p.idPedido','p.fechaHora','p.estado','p.totalPedido','p.idCliente')
                ->orderBy('p.idPedido','asc')
                ->groupBy('p.idPedido','p.fechaHora','p.estado','p.totalPedido','p.idCliente')
                ->paginate(10);
                return view('vendor.cliente.pedidos.index',['pedidos' =>$pedidos]);
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

       $productos = DB::table('productos as p')
       ->select(DB::raw('CONCAT(p.idProducto," ",p.nombreProducto) as producto'),'p.idProducto','p.stock','p.precio')
       ->where('p.stock','>','0')
       ->groupBy('producto','p.idProducto','p.stock','p.precio')
       ->get();

       return view('vendor.admin.pedidos.create',['productos'=>$productos]);

        } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
           
           try {
                DB::beginTransaction();
                $Pedido=new Pedido;
                $Pedido->totalPedido=$request->get('totalPedido');
                $mytime = Carbon::now('America/Bogota');
                $Pedido->fechaHora=$mytime->toDateTimeString();
                $Pedido->estado = 'A';
                $Pedido->save();

                $idProducto=$request->get('idProducto');
                $cantidad=$request->get('cantidad');
                $precioPedido=$request->get('precioPedido');

                $cont = 0;

                while ($cont < count($idProducto)) {
                       $detalle = new DetallePedido();
                       $detalle->idPedido=$Pedido->idPedido;
                       $detalle->idProducto=$idProducto[$cont];
                       $detalle->cantidad=$cantidad[$cont];
                       $detalle->precioPedido=$precioPedido[$cont];
                       $detalle->save();
                       $cont=$cont+1;
                }

                DB::commit();
               
           } catch (Exception $e) {
               DB::rollback();
           }

           return redirect('vendor.admin.pedidos');

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $pedido=DB::table('pedidos as p')
        ->join('detallepedidos as dv','p.idPedido','=','dv.idPedido')
        ->join('users as u', 'u.id','=','p.idCliente')
        ->select('p.idPedido','p.fechaHora','p.totalPedido','p.estado','p.totalPedido','p.idCliente','u.nombres','u.apellidos','u.numDocumento')
        ->where('p.idPedido','=',$id)
        ->first();

        $detalle=DB::table('detallepedidos as d')
        ->join('productos as p','d.idProducto','=','p.idProducto')
        ->select('p.nombreProducto','p.precio','d.cantidad','d.precioPedido')
        ->where('d.idPedido','=',$id)
        ->get();
        return view ('vendor.cliente.pedidos.show',['pedido'=>$pedido,'detallePedidos'=>$detalle]);
           
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
        $Pedido=Pedido::findOrFail($id);
        $Pedido->estado = 'C';
        $Pedido->update();
        return redirect()->route('vendor.admin.productos.index');
    }
     
}
