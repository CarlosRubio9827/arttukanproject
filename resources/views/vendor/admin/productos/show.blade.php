@extends("vendor.adminlte.layouts.app")
 @section('htmlheader_title')
     Artículo
@endsection

@section('contentheader_title')
 
@endsection

 @section("main-content")


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Información Del Artículo</b>
					
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <td><a href="{{ route('productos.edit', $producto->idProducto) }}" class="btn btn-primary pull-right">Editar</a></td>
                                        <td><a href="{{ route('productos.index') }}" class="btn btn-danger pull-left">Volver</a></td>                         
                                    </div>
                                </div>
                			</tr>
                		</head>
                		
                	</table>

                </div>
 			 </div>
        </div>
    </div>
</div>
@endsection