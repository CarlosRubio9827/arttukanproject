<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use PDF;
use DB;

class CarritoController extends Controller
{ 
   public function __construct()
   {
       // if ( ! \Session:: has ( ' cart ' )) \Session:: put ('cart', array ());
      if(!\Session::has('cart')) \Session::put('cart', array());

   }

    //mostrar carrito
    public function show (){

      $cart= \Session:: get ('cart');
      $total = $this->total();
      
      return view('vendor.cliente.productos.carrito',compact('cart','total'));
    
    }

    //agregar Productoo
 
   public function add( Producto $producto)
   {
          $cart = \Session::get('cart');
          $producto->cantidad=1;
          $cart[$producto->idProducto]=$producto;
          
          \Session::put('cart',$cart);

    return redirect()->route('mostrar-carrito');
   }
    
    //eliminar Productoo
   public function delete(Producto $producto)
   {

    $cart = \Session::get('cart');
    unset($cart[$producto->idProducto]);
    \Session::put('cart',$cart);

  return redirect()->route('mostrar-carrito');
   }
    

    //actualizar producto

  public function update(Producto $producto, $cantidad){
    // dd( 'sadadwqqwf'.$producto.$quantity);
    $cart = \Session::get('cart');
    $cart[$producto->idProducto]->cantidad=$cantidad;
    \Session::put('cart',$cart);

    return redirect()->route('mostrar-carrito');
  }

    //vaciar carrito

   public function trash(){
    \Session::forget('cart');
    return redirect()->route('mostrar-carrito');
   }


    //total
 private function total(){

    $cart = \Session::get('cart');
    $total=0;
   foreach ($cart as $item) {
     $total+=$item->precio * $item->cantidad;
   }
    return $total;
  }


  //detalle pedido

  public function detalle(){

    $api_key="4Vj8eK4rloUd272L48hsrarnUA";
    $email="cliente1@syslacstraining.com";
    
    $cliente = auth()->user();
		
		$email=$cliente->email;
		
		$info_pago=new \stdClass();
		$info_pago->merchantId="508029";
		$info_pago->accountId="512321";
		$info_pago->description="MIS VENTAS EN LINEA";
    $info_pago->referenceCode="PAGO001";

    $cart = \Session::get('cart');
    $total=0;
    foreach ($cart as $item) {
      $total+=$item->precio * $item->cantidad;
    }
		$info_pago->amount=$total;
    $info_pago->tax="0";
		$info_pago->taxReturnBase="0";
		$info_pago->currency="COP";
		$info_pago->signature=md5($api_key."~".$info_pago->merchantId."~".$info_pago->referenceCode."~".$total."~COP");
		$info_pago->test="1";
		$info_pago->buyerEmail=$email;
		$info_pago->responseUrl="http://localhost/arttukan/public/pagos/respuestasPago";
		$info_pago->confirmationUrl="http://pagos.syslacstraining.com/pagos/confirmacionpagos";

    //if (count(\Session::get('cart'))<=0) redirect()->route('catalogo');

  $cart= \Session:: get ('cart');
  $total = $this->total();

  return view('vendor.cliente.pedidos.detalle-pedido',compact('cart','total','info_pago'));

  }  

  //Pdf

  public function pdfQuotation()
  {        
    $cart= \Session:: get ('cart');
    $pdf = PDF::loadView('informe.card_list',compact('cart'));
    return $pdf->download('cotizacion-gotica.pdf');

  }

  public function respuestaPago(){
    return view('vendor.cliente.pagos.respuestasPagos');
  }
}