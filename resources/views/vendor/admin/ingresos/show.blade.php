 @extends("adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()
 
@section("main-content")
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Fecha Ingreso</label>
                            <p>{{ $ingreso->fechaHora }}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">    
                        <div class="form-group">
                            <label for="cantidad">Estado</label>
                            <p>{{ $ingreso->estado }}</p>
                        </div>
                    </div>

                    <div class="panel panel-primary" >
                        <div class="panel-body">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <table id="detalles" class="table table-striped table-responsive table-hover table-condensed table-bordered">
                                    <thead>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                    </thead>
 
                                    <tbody>
                                        @foreach ($detalleIngreso as $detalle)
                                            <tr>
                                                <td>{{ $detalle->nombreProducto }}</td>
                                                <td>{{ $detalle->cantidad }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>                               
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('ingresos.index') }}"><button class="btn btn-primary">Volver</button></a>
                </div>



@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>


   

@endsection()


@endsection