@extends("vendor.adminlte.layouts.app")

@section('htmlheader_title')
     Registrar Tipo Producto
@endsection

@section('contentheader_title')
       Tipos De Producto
@endsection

@section("main-content")

<div class="card bg-light mb-3" style="max-width: 100rem;">
	<div class="card-header">
		<h4>Registrar Tipo de Producto</h4>
	</div>

	<div class="card-body">
			
		<div class="container-fluid">
	
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
					<a href="{{ route('tipoProductos.index') }}"><button  class="btn btn-danger" >Cancelar</button></a>
				</div>

                    {!! Form::close() !!}  

 	</div>
 </div>
	

</div>

	

 
			
      
@endsection