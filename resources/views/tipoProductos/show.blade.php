@extends("adminlte.layouts.app")
 
 @section("main-content")


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Información De tipos de Productos
					
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
 			 </div>
        </div>
    </div>
</div>
@endsection