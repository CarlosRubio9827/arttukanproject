@extends("vendor.adminlte.layouts.app")

@section('htmlheader_title')
     Registrar Servicio
@endsection

@section('contentheader_title')
<div class="text-center">
	<b>Registrar Servicio</b>
</div>
      
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
						<h3 class="box-title"> Servicios </h3>
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
						   
							{!! Form::open(['route' => 'servicios.store', 'method'=>'POST','files' => 'true','autocomplete'=>'off']) !!}
							{{Form::token()}}
						   
							<div class="row">
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label for="codigoServicio"><b>Código Servicio</b></label>
										<input type="text" name="codigo" required value="{{ old('codigoServicios') }}"class='form-control' placeholder="Código Servicio">
									</div>
								</div>
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label for="nombreServicio"><b>Nombre Servicio</b></label>
										<input type="text" name="nombre" required value="{{ old('nombreServicio') }}"class='form-control' placeholder="Nombre Servicio">
									</div>
								</div>
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label for="precioServicio"><b>Precio Servicio</b></label>
										<input id="precio" class="input-number form-control" name="precio" required value="{{ old('precioServicio') }}"class='form-control' placeholder="Precio Servicio">
									</div>
								</div>
								
							
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
									<div class="form-group">
										<label for="imagen"><b>Imagen</b></label>
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
										<button id="pButton" class="btn btn-primary" type="submit">Guardar</button>
										<a href="{{ route('servicios.index') }}"><button  class="btn btn-danger" >Cancelar</button></a>
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
</section>       

      
@endsection

@section('js-view')

<script>

$(document).ready(function() {
	
	$('.input-number').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
        });
	   
        });
 



</script>
	
@endsection