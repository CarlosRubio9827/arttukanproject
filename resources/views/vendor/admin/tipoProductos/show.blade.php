@extends("vendor.adminlte.layouts.app")
 

@section('htmlheader_title')
     Tipo Producto
@endsection

@section('contentheader_title')
   <b>Detalle de Tipo Producto</b> 
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
						<b><h3 class="box-title">Tipo de Producto: {{ $tipoProducto->nombreTipoProducto }}</h3></b>
					</div>
					<div class="box-body">
                        <table class="table table-hover">
                            <head>
                                <tr>
                                    <td><b>ID</b></td>
                                        <td>{{ $tipoProducto->idTipoProducto }}</td>
                                </tr>
                                <tr>
                                    <td><b>Nombre</b></td>
                                        <td>{{ $tipoProducto->nombreTipoProducto }}</td>
                                </tr>
                                <tr>
                                    <td><b>Descripcion</b></td>
                                        <td>{{ $tipoProducto->descripcionTipoProducto }}</td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('tipoProductos.edit', $tipoProducto->idTipoProducto) }}" class="btn btn-primary pull-right">Editar</a></td>
                                    <td><a href="{{ route('tipoProductos.index') }}" class="btn btn-primary pull-left">Volver</a></td>
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