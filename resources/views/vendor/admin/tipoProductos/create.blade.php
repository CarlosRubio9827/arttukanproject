@extends("vendor.adminlte.layouts.app")

@section('htmlheader_title')
     Registrar Producto
@endsection
  
@section('contentheader_title')
<div class="text-center">
	<b>Registrar Producto</b>
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
						<h3 class="box-title"> <b>Productos </b> </h3>
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
							{!! Form::open(['route' => 'tipoProductos.store','method'=>'POST']) !!}

							{{Form::token()}}
								
							<div class="form-group">
								{!! Form::label('nombreTipoProducto', 'Nombre Producto *') !!}
								{!! Form::text('nombreTipoProducto', null, ['class' => 'form-control', 'required']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('descripcionTipoProducto', 'Descripcion *') !!}
								{!! Form::text('descripcionTipoProducto', null, ['class' => 'form-control','required']) !!}
							</div>
						
							<div class="form-group">
								
								{!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
  
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<button class="btn btn-danger" type="button" onclick="history.back()">Cancelar</button>
					
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