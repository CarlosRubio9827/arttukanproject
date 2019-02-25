@extends("adminlte.layouts.app")
 
@section('css-view')

 <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
@endsection()

 
@section("main-content")
 


<div class="prueba">

	<div class="row">
 	<div class="col-md-6 col-xs-12 col-lg6 col-sm-6">
 		<h3>Nuevo Producto</h3>
 		 
 		@if (count($errors)>0)
 			<div class="alert alert-danger">
 			<ul>
 				@foreach ($errors->all() as $error)
 				<li>{{ $error }}</li>
 				@endforeach
 			</ul>
 		    </div>
 
 		@endif
 	</div>
  </div>

</div>
  
 
				{!! Form::open(['route' => 'productos.store', 'method'=>'POST','files' => 'true','autocomplete'=>'off']) !!}
				{{Form::token()}}

				<div class="row">

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
						<div class="form-group">
							<label for="nombreProducto">Nombre Producto</label>
						    <input type="text" name="nombreProducto" required value="{{ old('nombreProducto') }}"class='form-control' placeholder="Nombre Producto">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
						<div class="form-group">
							<label for="precioProducto">Precio Producto</label>
						    <input type="text" name="precioProducto" required value="{{ old('precioProducto') }}"class='form-control' placeholder="Precio Producto">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
						<div class="form-group">
							<label>Tipo Producto</label>
							<select name="idTipoProducto" id="idProducto" class="form-control selectpicker" data-live-search='true'>
								@foreach ($tipoProductos as $tipoProducto)
									<option value="{{ $tipoProducto->idTipoProducto }}">{{ $tipoProducto->nombreTipoProducto }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
						<div class="form-group">
						    <label for="stock">Stock</label>
						    <input type="number" name="stock" required value="{{ old('stock') }}"class='form-control' placeholder="Stock">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
						<div class="form-group">
							  <label for="imagen">Imagen</label>
						    {!! Form::file('image',['class'=>'form-control']) !!}
						</div> 
					</div>
					<br>

				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
						<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<a href="{{ route('productos.index') }}"><button  class="btn btn-danger" >Cancelar</button></a>
						</div>
					</div>

				</div>

                    {!! Form::close() !!}       
      

@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>

@endsection
@endsection