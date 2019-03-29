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
          $pedido->estado = 'A';
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
         return view("vendor.cliente.pagos.respuestasPagos");
     }
     else
     {
        return view('vendor.cliente.pagos.errorRespuestasPagos') ;
     }
}
public function getConfirmacionpagos()
{



}
}

