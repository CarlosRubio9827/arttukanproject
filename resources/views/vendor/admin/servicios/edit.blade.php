@extends("vendor.adminlte.layouts.app")

@section('htmlheader_title')
     Editar Servicio
@endsection

 @section('contentheader_title')
 <div class="text-center">
	 <b>Editar Servicio</b>
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
					<h3 class="box-title">	Editar Servicio: {{ $servicio->nombre }}
						@if (count($errors)>0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach	
						</ul>
					</div>
						@endif 
					</h3> 
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
					   
									   {!! Form::model($servicio,['method' => 'PATCH', 'route' => ['servicios.update',$servicio->idServicio],'files'=>'true']) !!}
									   {{ Form::token() }}
										
									<div class="row">
					
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
											<div class="form-group">
												   <label for="codigoServicio"><b>Código Servicio</b></label>
												   <input type="text" name="codigo" required value="{{ $servicio->codigo }}"class='form-control'>
											</div>
										</div>
					   
										   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
											   <div class="form-group">
												   <label for="nombreServicio"><b>Nombre Servicio</b></label>
												   <input type="text" name="nombre" required value="{{ $servicio->nombre }}"class='form-control'>
											   </div>
										   </div>
					   
										   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
											   <div class="form-group">
												   <label for="stock"><b>Precio</b></label>
												   <input class="input-number form-control" type="number" min="1" name="precio" required value="{{ $servicio->precio }}" >
											   </div>
										   </div>
					   
										   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
											   <div class="form-group">
												   <label for="imagen"><b>Imagen</b></label>
												   {!! Form::file('image',['class'=>'form-control']) !!}
												   @if (($servicio->imagen) != "")
													   <img src="{{ asset('images/'.$servicio->imagen) }}"  height="75px" width="75px" class="img-thumbnail">
												   @endif
											   </div>
											 </div>

											 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
												<div class="form-group">
													<label for="descripcion"><b>Descripcion</b></label>
													<textarea name="descripcion" class='form-control form-group-lg'  rows="1" cols="50">		
													{{$servicio->descripcion}}
													</textarea>
												</div>
											</div>
					   
										   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
												<div class="form-group">
													<br>
													<button class="btn btn-primary" type="submit">Guardar</button>
													
														<button class="btn btn-danger" type="button" onclick="history.back()">Cancelar</button>
													
												</div>
											</div>	

						 </div>				 
						{!! Form::close() !!}       
					</div>
				</div>
								<!-- /.box-body -->
			</div>
							<!-- /.box -->
		</div>
	</div>
</div>
</section><!-- /.content -->     
			 
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