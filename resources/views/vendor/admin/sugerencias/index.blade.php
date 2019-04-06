@extends("vendor.adminlte.layouts.app")

@section('css-view')

<link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
<link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>
 @endsection()

@section('htmlheader_title')
    Sugerencias
@endsection
 
@section('contentheader_title')
<div class="text-center">
    <b>Sugerencias</b>
</div>
@endsection

 @section("main-content") 
 
<section class="content">
    <!-- Your Page Content Here -->
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!-- Default box -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <b>Sugerencias 
                        
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="{{ route('ventasPdf') }}">PDF</a></li>
                      </ul>
                    </div> 

                    @if(count($sugerencias))

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="ventas-dt" class="table table-striped table-bordered table-condensed table-hover" width="750">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre Usuario</th>
                                    <th>Email</th>
                                    <th>Opciones</th> 
                                </thead>
                                    @foreach ($sugerencias as $sugerencia)
                                <tr> 
                                    <td>{{$sugerencia->idSugerencia}}</td>
                                    <td>{{$sugerencia->nombres }}</td>
                                    <td>{{$sugerencia->email}}</td>
                                    <td> 
                                        <a href="{{ route('sugerencias/mostrar', $sugerencia->idSugerencia)  }}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                                     @endforeach
                            </table>
                        </div>
                                {{ $sugerencias->render() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                @else
                <div class="card card-nav-tabs text-center">
                    <div class="card-body">
                  <h1 style="color:#000">Actualmente no tienes sugerencias registradas</h1>
                    </div> 
                </div>

            @endif
            </div>
        </div>
    </div>
</section><!-- /.content -->        

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')

@section('js-view')

 <script type="text/javascript" src="{{  asset('js/datatables.js')  }}"></script>
 <script type="text/javascript" src="{{  asset('js/dataTables.bootstrap.js')  }}"></script>
   
 <script>
$(document).ready( function () {

    $('#ventas-dt').DataTable({    
oLanguage: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
   } );
    
} );
</script>
@endsection()
@endsection()