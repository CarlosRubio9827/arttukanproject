@extends("vendor.adminlte.layouts.app")
 
 @section('contentheader_title')
       
@endsection

@section('css-view')
 
 <link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
  <link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>

@endsection()

 @section('htmlheader_title')
    Modificar Producto
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
						<h3 class="box-title">	Editar Producto: {{ $producto->nombreProducto }}
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
						   
										   {!! Form::model($producto,['method' => 'PATCH', 'route' => ['productos.update',$producto->idProducto],'files'=>'true']) !!}
										   {{ Form::token() }}
											
										<div class="row">
						
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
												<div class="form-group">
													   <label for="codigoProducto">Código Producto</label>
													   <input type="text" name="codigoProducto" required value="{{ $producto->codigoProducto }}"class='form-control'>
												</div>
											</div>
						   
											   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
												   <div class="form-group">
													   <label for="nombreProducto">Nombre Producto</label>
													   <input type="text" name="nombreProducto" required value="{{ $producto->nombreProducto }}"class='form-control'>
												   </div>
											   </div>
						   
											   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
												   <div class="form-group">
													   <label>Tipo Producto</label>
													   <select name="idTipoProducto" class="form-control">
														   @foreach ($tipoProductos as $tipoProducto)
														   @if ($producto->idTipoProducto==$tipoProducto->idTipoProducto)
															   
															   <option value="{{ $tipoProducto->idTipoProducto }}" selected>
																{{ $tipoProducto->nombreTipoProducto }}</option>
															   @else
															   <option value="{{ $tipoProducto->idTipoProducto }}">{{ $tipoProducto->nombreTipoProducto }}</option>
														   @endif
														   @endforeach
													   </select>
												   </div>
											   </div>
						   
											   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
												   <div class="form-group">
													   <label for="stock">Stock</label>
													   <input type="number" name="stock" required value="{{ $producto->stock }}"class='form-control'>
												   </div>
											   </div>
						   
											   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
												   <div class="form-group">
													   <label for="imagen">Imagen</label>
													   {!! Form::file('image',['class'=>'form-control']) !!}
													   @if (($producto->imagen) != "")
														   <img src="{{ asset('images/'.$producto->imagen) }}"  height="75px" width="75px" class="img-thumbnail">
													   @endif
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