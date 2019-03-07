@extends("adminlte.layouts.app")
 @section('htmlheader_title')
     Producto
@endsection
 @section("main-content")


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Información Del Producto
					
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
                                <td><b>Stock</b></td>
                                    <td>{{ $producto->stock }}</td>
                            </tr>
                            <tr>
                                <td><b>Precio</b></td>
                                    <td>{{ $producto->precio }}</td>
                            </tr>
                            <tr>
                                <td><b>Imagen</b></td>
                                    <td><img src="images/{{ $producto->imagen }}" width="100" height="100" alt="{{ $producto->nombreProducto }}" class="img-thumbnail"></td>y
                            </tr>
                			<tr>
                			 	<td><a href="{{ route('productos.edit', $producto->idProducto) }}" class="btn btn-primary pull-right">Editar</a></td>
                                <td><a href="{{ route('productos.index') }}" class="btn btn-primary pull-left">Volver</a></td>
                			</tr>
                		</head>
                		
                	</table>

                </div>
 			 </div>
        </div>
    </div>
</div>
@endsection