@extends("adminlte.layouts.app")
 
 @section("contentheader_title")


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Información de Usuario
					
					<table class="table table-hover">
                		<head>
                			<tr>
                		    	<td><b>ID</b></td>
                		    		<td>{{ $producto->idProducto }}</td>
                			</tr>
                            <tr>
                                <td><b>Nombre</b></td>
                                    <td>{{ $producto->nombreProducto }}</td>
                            </tr>
                            <tr>
                                <td><b>Minimo</b></td>
                                    <td>{{ $producto->minimo }}</td>
                            </tr>
                            <tr>
                                <td><b>Precio</b></td>
                                    <td>{{ $producto->precio }}</td>
                            </tr>
                            <tr>
                                <td><b>Imagen</b></td>
                                    <td><img src="images/{{ $producto->imagen }}" idth="100" height="100"></td>y
                            </tr>
                			<tr>
                			 	<td><a href="{{ route('productos.edit', $producto->idProducto) }}" class="btn btn-primary pull-right">Editar</a></td>
                                <td><a href="{{ url()->previous()}}" class="btn btn-primary pull-left">Volver</a></td>
                			</tr>
                		</head>
                		
                	</table>

                </div>
 			 </div>
        </div>
    </div>
</div>
@endsection