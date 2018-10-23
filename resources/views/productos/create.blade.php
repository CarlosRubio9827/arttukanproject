@extends("adminlte.layouts.app")
 

 
 @section("main-content")

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
							<label>Tipo Producto</label>
							<select name="idTipoProducto" class="form-control">
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

				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
						<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<a href="{{ route('productos.index') }}"><button  class="btn btn-danger" >Cancelar</button></a>
						</div>
					</div>

				</div>

                    {!! Form::close() !!}       
      
@endsection