 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()

@section('contentheader_title')

@endsection

 @section('htmlheader_title')
     Información del Cliente
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
                    <h3 class="box-title">Cliente </h3>
                    </div>
                    <div class="box-body">

                         <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">

                            <h3 class="profile-username text-center">{{$cliente->nombres}} {{$cliente->apellidos}}</h3>
                            <p class="text-muted text-center">Id: {{$cliente->id}}</p>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                <b>Tipo Documento</b> <a class="pull-right">{{$cliente->tipoDocumento}}</a>
                                </li>
                                <li class="list-group-item">
                                <b>Número Documento</b> <a class="pull-right">{{$cliente->numDocumento}}</a>
                                </li>
                                <li class="list-group-item">
                                <b>Email</b> <a class="pull-right">{{$cliente->email}}</a>
                                </li>
                                <li class="list-group-item">
                                <b>Dirección</b> <a class="pull-right">{{$cliente->direccion}}</a>
                                </li>
                                <li class="list-group-item">
                                <b>Teléfono</b> <a class="pull-right">{{$cliente->telefono}}</a>
                                </li>
                            </ul>

                        <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-block"><b><i class="fa fa-chevron-left"></i> Volver</b></a>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                </div>
                    <!-- /.box-body -->
            </div>
                <!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->        





@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>


   

@endsection()


@endsection