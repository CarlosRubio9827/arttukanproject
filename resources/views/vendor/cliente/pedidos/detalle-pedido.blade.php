 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()

@section('htmlheader_title')
    Detalle Pedido
@endsection

@section('contentheader_title')
 
@endsection

@section("main-content")
                
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i> Detalle del pedido</h1>
    </div>

    <div class="box box-default">
        <div class="table-responsive">
            <h3>Datos del usuario</h3>
            <table class="table table-striped table-hover table-bordered">
                <tr><td><strong>Nombre:</strong></td><td>{{ Auth::user()->nombres . " " . Auth::user()->apellidos }}</td></tr>
                <tr><td><strong>Nuip:</strong></td><td>{{ Auth::user()->numDocumento }}</td></tr>
                <tr><td><strong>Correo:</strong></td><td>{{ Auth::user()->email }}</td></tr>
                <tr><td><strong>Dirección:</strong></td><td>{{ Auth::user()->direccion }}</td></tr>
            </table>
        </div>
        <div class="table-responsive">
            <h3>Datos del pedido</h3>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->nombreProducto }}</td>
                        <td>${{ number_format($item->precio) }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>${{ number_format($item->precio * $item->cantidad) }}</td>
                    </tr>
                @endforeach
            </table><hr>
            <h3>
                <span class="label label-success">
                    Total: ${{ number_format($total) }}
                </span>
            </h3><hr>
            <p>
                <a href="{{ route('mostrar-carrito') }}" class="btn btn-primary">
                    <i class="fa fa-chevron-circle-left"></i> Regresar
                </a>

                
<button class="btn btn-success">
                <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
                    <input name="merchantId"    type="hidden"  value="{{$info_pago->merchantId}}"   >
                    <input name="accountId"     type="hidden"  value="{{$info_pago->accountId}}" >
                    <input name="description"   type="hidden"  value="{{$info_pago->description}}"  >
                    <input name="referenceCode" type="hidden"  value="{{$info_pago->referenceCode}}" >
                    <input name="amount"        type="hidden"  value="{{$info_pago->amount}}"   >
                    <input name="tax"           type="hidden"  value="{{$info_pago->tax}}"  >
                    <input name="taxReturnBase" type="hidden"  value="{{$info_pago->taxReturnBase}}" >
                    <input name="currency"      type="hidden"  value="{{$info_pago->currency}}" >
                    <input name="signature"     type="hidden"  value="{{$info_pago->signature}}"  >
                    <input name="test"          type="hidden"  value="{{$info_pago->test}}" >
                    <input name="buyerEmail"    type="hidden"  value="{{$info_pago->buyerEmail}}" >
                    <input name="responseUrl"    type="hidden"  value="{{$info_pago->responseUrl}}" >
                    <input name="confirmationUrl"    type="hidden"  value="{{$info_pago->confirmationUrl}}" >
                    <input name="Submit"        type="submit"  value="Pagar con PayU" >
                  </form>
                </button>

                </p>
        </div>
    </div>
</div>


@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>


   

@endsection()


@endsection