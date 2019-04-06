@extends("vendor.adminlte.layouts.app")
 

@section('htmlheader_title')
     Información de la Solicitud
@endsection

@section('contentheader_title')
<div class="text-center">
    <b>Información de la Solicitud</b>
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
                        <div class="text-center">
                            <h3 class="box-title"><b>Solicitud: {{ $servicio->idUsuarioServicios }}</b></h3>
                        </div>
                    </div>
                   
					<div class="box-body">
                        <table class="table table-hover">
                            <head>
                                <tr>
                                    <td><b>Nombre Servicio</b></td>
                                    <td>{{ $servicios->nombre }}</td>
                                </tr>
                                <tr>
                                    <td><b>Fecha - Hora Solicitud</b></td>
                                    <td>{{ $servicio->created_at}}</td>
                                </tr>
                                <tr>
                                    <td><b>Nombre Cliente</b></td>
                                    <td>{{ $cliente->nombres}} {{$cliente->apellidos}}</td>
                                </tr>
                                <tr>
                                    <td><b>Num Documento Cliente</b></td>
                                    <td>{{ $cliente->numDocumento}}</td>
                                </tr>
                                <tr>
                                    <td><b>Teléfono</b></td>
                                    <td>{{ $cliente->telefono}}</td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>{{ $cliente->email}}</td>
                                </tr>
                                <tr>
                                    <td><b>Estado Solicitud</b></td>
                                    <td>{{($servicio->estadoSolicitud)}}</td>
                                </tr>
                            </head> 
                        </table>
                        <div class="text-center">
                            <a href="{{route('usuarioServicio/index')}}"><div class="btn btn-danger"><i class="fa fa-chevron-circle-left"></i> Volver</div></a>
                        </div>
					</div>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
</section><!-- /.content -->        
 
@endsection