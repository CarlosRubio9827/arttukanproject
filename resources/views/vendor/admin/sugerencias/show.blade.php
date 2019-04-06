 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()

@section('contentheader_title')
<div class="text-center">
    <b>Detalle de la Sugerencia</b>
</div>

@endsection

 @section('htmlheader_title')
     Información de Sugerencia
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
                            <h3 class="box-title"><b>Sugerencia {{ $sugerencia->idSugerencia }}</b></h3>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <strong> Fecha Sugerencia </strong>
                                    <p>{{ $sugerencia->created_at }}</p>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <strong> Cliente </strong>
                                <p>{{ $sugerencia->nombres }}</p>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">    
                                <div class="form-group">
                                    <strong> Email </strong> 
                                    <p>{{ $sugerencia->email }}</p>
                                </div>
                            </div>
                        </div>   
                        <div class="panel-body">
                             <div class="text-cente">
                                 {{$sugerencia->sugerencias}}
                             </div>
                        </div>
                        <div class="panel-body" align="center">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <a href="{{ route('sugerencias/index') }}"><button class="btn btn-danger">Volver</button></a>
                            </div>
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