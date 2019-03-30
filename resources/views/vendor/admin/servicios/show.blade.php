@extends("vendor.adminlte.layouts.app")
 

@section('htmlheader_title')
     Servicio
@endsection

@section('contentheader_title')
   <b>Detalle del Servicio</b> 
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
						<b><h3 class="box-title">Servicio: {{ $servicio->nombre }}</h3></b>
                    </div>
                   
					<div class="box-body">
                        <table class="table table-hover">
                            <head>
                                <tr>
                                    <td><b>ID</b></td>
                                        <td>{{ $servicio->idServicio }}</td>
                                </tr>
                                <tr>
                                    <td><b>Código</b></td>
                                    <td>{{ $servicio->codigo}}</td>
                                </tr>
                                <tr>
                                    <td><b>Nombre</b></td>
                                        <td>{{ $servicio->nombre }}</td>
                                </tr>
                                <tr>
                                    <td><b>Precio</b></td>
                                    <td>$ {{number_format($servicio->precio)}}</td>
                                </tr>
                                <tr>
                                    <td><b>Descripcion</b></td>
                                        <td>{{ $servicio->descripcion }}</td>
                                </tr>
                                <tr>
                                    <td><b>Imagen</b></td>
                                        <td><img src="{{ asset('images/'.$servicio->imagen) }}" width="100" height="100" alt="{{ $servicio->nombre }}" class="img-thumbnail"></td>y
                                </tr>
                                <tr>
                                    <td><a href="{{ route('servicios.edit', $servicio->idServicio) }}" class="btn btn-primary pull-right">Editar</a></td>
                                    <td><a href="{{ route('servicios.index') }}" class="btn btn-primary pull-left">Volver</a></td>
                                </tr>
                            </head> 
                        </table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
</section><!-- /.content -->        
 
@endsection