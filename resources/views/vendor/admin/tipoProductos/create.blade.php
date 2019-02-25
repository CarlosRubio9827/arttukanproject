@extends("vendor.adminlte.layouts.app")

@section("main-content")

<div class="container-fluid">
  <div class="row">
 	<div class="col-md-6 col-xs-12 col-lg6 col-sm-6">
 		<h3>Nuevo Tipo Producto</h3>
 		
 		@if (count($errors)>0)
 			<div class="alert alert-danger">
 			<ul>
 				@foreach ($errors->all() as $error)
 				<li>{{ $error }}</li>
 				@endforeach
 				
 			</ul>
 		    </div> 
 		@endif

				{!! Form::open(['route' => 'tipoProductos.store','method'=>'POST']) !!}

				{{Form::token()}}
				   
				<div class="form-group">
					{!! Form::label('nombreTipoProducto', 'Nombre Tipo Producto') !!}
					{!! Form::text('nombreTipoProducto', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('descripcionTipoProducto', 'Descripcion') !!}
					{!! Form::text('descripcionTipoProducto', null, ['class' => 'form-control']) !!}
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