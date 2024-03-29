 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()

@section('contentheader_title')
<div class="text-center">
    <b>Detalle de Venta</b>
</div>

@endsection

 @section('htmlheader_title')
     Información de Venta
@endsection

 
@section("main-content")


<section class="content">
        <!-- Your Page Content Here -->
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Venta {{ $ventas->idVenta }}</h3>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <strong> Fecha Venta </strong>
                                    <p>{{ $ventas->fechaHora }}</p>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <strong> Cliente </strong>
                                <p>{{ $ventas->nombres }} {{$ventas->apellidos}} - {{$ventas->numDocumento}}</p>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">    
                                <div class="form-group">
                                    <strong> Estado </strong> 
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
                                            <th><h4 id="total">$ {{number_format($ventas->totalVenta)  }}</h4></th>
                                        </tfoot>
                                        <tbody>
                                                        @foreach ($detalleVentas as $detalle)
                                                            <tr>
                                                                <td>{{ $detalle->nombreProducto }}</td>
                                                                <td>{{ $detalle->cantidad }}</td>
                                                                <td>$ {{ number_format($detalle->precioVenta) }}</td>
                                                                <td>$ {{ number_format($detalle->cantidad*$detalle->precioVenta) }}</td>
                                                            </tr>
                                                        @endforeach
                                        </tbody>
                                    </table>                               
                            </div>
                        </div>
                        <div class="panel-body" align="center">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <a href="{{ route('ventas.index') }}"><button class="btn btn-danger">Volver</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- /.box-body -->
            </div>
                <!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->        





@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>


   

@endsection()


@endsection