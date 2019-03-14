 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()
 
@section('contentheader_title')
    Detalle de Ingreso
@endsection

 @section('htmlheader_title')
     Información de Ingreso
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
						<h3 class="box-title">Ingreso {{ $ingresos->idIngreso }}</h3>

						
					</div>
					<div class="box-body">
                    <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Fecha Ingreso</label>
                            <p>{{ $ingresos->fechaHora }}</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">    
                        <div class="form-group">
                            <label for="cantidad">Estado</label>
                            <p>{{ $ingresos->estado }}</p>
                        </div>
                    </div>  
                </div>

                <div class="panel-body">
                        <div class="table-responsive">
                        <table id="detalles" class="table table-striped table-responsive table-hover table-condensed table-bordered">
                            <thead class="thead-dark">
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                            </thead>
 
                            <tbody>
                                        @foreach ($detalleIngresos as $detalle)
                                <tr>
                                    <td>{{ $detalle->codigoProducto }}</td>
                                    <td>{{ $detalle->nombreProducto }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                </tr>
                                        @endforeach 
                            </tbody>
                        </table>                               
                    </div>
                </div>

                <div class="panel-body" align="center">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <a href="{{ route('ingresos.index') }}"><button class="btn btn-primary">Volver</button></a>
                    </div>
                </div> 

                   

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
</section><!-- /.content -->        

@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>


   

@endsection()


@endsection