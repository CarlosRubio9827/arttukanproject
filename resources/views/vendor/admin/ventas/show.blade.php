 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()

@section('contentheader_title')
    Detalle de Venta
@endsection

 @section('htmlheader_title')
     Información de Venta
@endsection

 
@section("main-content")
<div class="container" align="center" >
   
  <div class="card bg-light mb-3" style="max-width: 50rem;">
      <div class="card-header">
        <h4>Venta {{ $ventas->idVenta }}</h4>
      </div>

      <div class="card-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Fecha Venta</label>
                            <p>{{ $ventas->fechaHora }}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">    
                        <div class="form-group">
                            <label for="cantidad">Estado</label>
                            <p>{{ $ventas->estado }}</p>
                        </div>
                    </div>
                </div>   
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="detalles" class="table table-striped table-responsive table-hover table-condensed table-bordered">
                                    <thead class="thead-dark">
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio venta</th>
                                        <th>Sub Total</th>
                                    </thead>
                                    <tfoot>
                                        <th><h4>Total Venta</h4></th>
                                        <th></th>
                                        <th></th>
                                        <th><h4 id="total">{{ $ventas->totalVenta }}</h4></th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($detalleVentas as $detalle)
                                            <tr>
                                                <td>{{ $detalle->nombreProducto }}</td>
                                                <td>{{ $detalle->cantidad }}</td>
                                                <td>{{ $detalle->precioVenta }}</td>
                                                <td>{{ $detalle->cantidad*$detalle->precioVenta }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>                               
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <a href="{{ route('ventas.index') }}"><button class="btn btn-primary">Volver</button></a>
                            </div>
                        </div>
        </div> 
    </div>
</div>



@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>


   

@endsection()


@endsection