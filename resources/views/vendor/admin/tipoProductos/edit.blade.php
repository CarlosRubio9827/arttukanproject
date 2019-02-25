@extends("vendor.adminlte.layouts.app")
 
 @section('contentheader_title')
       Editar Tipo Producto
@endsection

@section('css-view')

 <link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
  <link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>

@endsection()
 
 @section("main-content")

<div class="container-fluid">
	
  <div class="row">
 	<div class="col-md-6 col-xs-12 col-lg6 col-sm-6">
 		<h3>Editar Tipo Producto: {{ $tipoProducto->nombreTipoProducto }}</h3>
 		
 		@if (count($errors)>0)
 			<div class="alert alert-danger">
 			<ul>
 				@foreach ($errors->all() as $error)
 				<li>{{ $error }}</li>
 				@endforeach
 				 
 			</ul>
 		    </div>
 		@endif

				{!! Form::model($tipoProducto,['method' => 'PATCH', 'route' => ['tipoProductos.update',$tipoProducto->idTipoProducto]]) !!}
 
				{{ Form::token() }}
				 
				<div class="form-group">
					{!! Form::label('nombreTipoProducto', 'Nombre Tipo Producto') !!}
					{!! Form::text('nombreTipoProducto', null, ['class' => 'form-control', 'value'=>'{{ $producto->nombreTipoProducto }']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('descripcionTipoProducto', 'Descripcion') !!}
					{!! Form::text('descripcionTipoProducto', null, ['class' => 'form-control','value'=>'{{ $producto->stock }']) !!}
				</div>
				
			
				<div class="form-group">
					{!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}

				</div>

                    {!! Form::close() !!}       

                   <span class="input-group-btn"><a href="{{ route('tipoProductos.index') }}"><button class="btn btn-danger">Volver</button></a></span> 


 	</div>
 </div>

 	

</div>
 

 
			
      
@endsection