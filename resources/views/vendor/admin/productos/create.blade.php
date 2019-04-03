@extends("vendor.adminlte.layouts.app")
 
@section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()

@section('htmlheader_title')
    Registrar Artículo
@endsection

@section('contentheader_title')
        
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
						<h3 class="box-title"> Registrar Artículo </h3>
					</div>
					<div class="box-body">
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
						   
							{!! Form::open(['route' => 'productos.store', 'method'=>'POST','files' => 'true','autocomplete'=>'off']) !!}
							{{Form::token()}}
						   
							<div class="row">
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label for="codigoProducto"><b>Código Artículo</b></label>
										<input type="text" name="codigoProducto" required value="{{ old('codigoProducto') }}"class='form-control' placeholder="Codigo Artículo">
									</div>
								</div>
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label for="nombreProducto"><b>Nombre Artículo</b></label>
										<input type="text" name="nombreProducto" required value="{{ old('nombreProducto') }}"class='form-control' placeholder="Nombre Artículo">
									</div>
								</div>
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label for="precioProducto"><b>Precio Artículo</b></label>
										<input class="input-number form-control" type="number" min="1" name="precioProducto" required value="{{ old('precioProducto') }}"  placeholder="Precio Artículo">
									</div>
								</div>
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label><b>Producto</b></label>
										<select name="idTipoProducto" id="idProducto" class="form-control selectpicker" data-live-search='true'>
											@foreach ($tipoProductos as $tipoProducto)
												<option value="{{ $tipoProducto->idTipoProducto }}">{{ $tipoProducto->nombreTipoProducto }}</option>
											@endforeach
										</select>
									</div>
								</div>
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label for="stock"><b>Stock</b></label>
										<input class="input-number form-control" type="number" min="1" name="stock" required value="{{ old('stock') }}"  placeholder="Stock">
									</div>
								</div>
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label for="imagen"><b>Imagen</b> </label>
											{!! Form::file('image',['class'=>'form-control']) !!}
									</div> 
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
									<div class="form-group">
										<label for="descripcion"><b>Descripción</b></label>
										<textarea name="descripcion" required value="{{ old('descripcion') }}"class='form-control form-group-lg' placeholder="Descripcion" rows="1" cols="50">		
										</textarea>
									</div>
								</div>
								
								<br>
							
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
									<div class="form-group text-center" >
										<button class="btn btn-primary" type="submit">Guardar</button>
										<a href="{{ route('productos.index') }}"><button  class="btn btn-danger" >Cancelar</button></a>
									</div>
								</div>
							
							</div>
								{!! Form::close() !!}    
							
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>
		</div>
	</div>
</section><!-- /.content -->        

 
      
@endsection

@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>


<script>

	$(document).ready(function() {
		
		$('.input-number').on('input', function () { 
			this.value = this.value.replace(/[^0-9]/g,'');
			});

		});

</script>

@endsection