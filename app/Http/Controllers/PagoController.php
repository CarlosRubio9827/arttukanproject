<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use DB;
use App\Pago;
use Illuminate\Foundation\Auth\User;
use App\Pedido;
use Faker\Provider\cs_CZ\DateTime;
use Carbon\Carbon;
use App\DetallePedido;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Alert;

  
class PagoController extends Controller
{

public function respuestaPago()
{
    $transactionState = $_REQUEST['transactionState'];
    $processingDate	=$_REQUEST['processingDate'];
    $buyerEmail=$_REQUEST['buyerEmail'];
    $transactionId = $_REQUEST['transactionId'];
    if($transactionState==4)
    {

        $usuario= auth()->user();

        $pago = new Pago();
          $pago->reference=$transactionId;
          $pago->state=$transactionState;
          $pago->idCliente=$usuario->id;
          $pago->save();
          
          $cart= \Session:: get ('cart');
            $totalPedido=0;
        foreach ($cart as $item) {
            $totalPedido+=$item->precio * $item->cantidad;
        }

          $pedido = new Pedido(); 
          $mytime = Carbon::now('America/Bogota');
          $pedido->fechaHora=$mytime->toDateTimeString();
          $pedido->idcliente=$usuario->id;
          $pedido->idPag=$pago->idPago;
          $pedido->totalPedido=$totalPedido;
          $pedido->estado = 'Pendiente';
          $pedido->save();
           
          foreach ($cart as $itemProducto)
          { 
              $detallePedido=new DetallePedido();
              $detallePedido->idPedido=$pedido->idPedido;
              $detallePedido->idProducto=$itemProducto->idProducto;
              $detallePedido->cantidad=$itemProducto->cantidad;
              $detallePedido->precioPedido=$itemProducto->precio * $itemProducto->cantidad;
              $detallePedido->save();
          }
         $carrito=new  \stdClass();
         $carrito->total=0;
         $carrito->productos=[];   
         Session::put("carrito", $carrito);

         $id = $pedido->idPedido;

        

         $pedidos=DB::table('pedidos as p')
         ->join('detallepedidos as dv','p.idPedido','=','dv.idPedido')
         ->join('users as u', 'u.id','=','p.idCliente')
         ->select('p.idPedido','p.fechaHora','p.totalPedido','p.estado','p.totalPedido','p.idCliente','u.nombres','u.apellidos','u.numDocumento')
         ->where('p.idPedido','=',$id)
         ->first();
 
         $detalles=DB::table('detallepedidos as d')
         ->join('productos as p','d.idProducto','=','p.idProducto')
         ->select('p.nombreProducto','p.precio','d.cantidad','d.precioPedido')
         ->where('d.idPedido','=',$id)
         ->get(); 

         Alert::success('¡Correcto!', 'El pedido ha sido registrado satisfactoriamente')->autoclose(4000);

         return view("vendor.cliente.pagos.respuestasPagos",['pedido'=>$pedidos,'detallePedidos'=>$detalles]);
     }
     else
     {
        return "EROOR" ;
     }
}
public function getConfirmacionpagos()
{



}
}

