 @extends("vendor.adminlte.layouts.app")

@section('css-view')

@endsection()
 
@section('htmlheader_title')
Servicios
@endsection

@section('contentheader_title')
<div class="text-center">
    <b>Servicios - ArtTukan</b> 
</div>

@endsection
  
 @section("main-content")
 @if(count($usuarioServicio))

    <div class="box box-success">
        <div class="box-header with-border">
            <div class="text-center">
                   <b>Solicitud de Servicios</b>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="ventas-dt" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th class="text-center">ID Solicitud</th>
                        <th class="text-center">Servicio</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">Fecha - Hora</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Opciones</th> 
                    </thead>
                        @foreach ($usuarioServicio as $pedido)
                    <tr> 
                        <td>{{$pedido->idUsuarioServicios }}</td>
                        <td>{{$pedido->nombre}}</td>
                        <td>{{$pedido->nombres }} {{$pedido->apellidos}}</td>
                        <td>{{$pedido->created_at}}</td>
                        <td>{{$pedido->estadoSolicitud}}</td>
                        <td>
                            <a href="{{ route('usuarioServicio/mostrar', $pedido->idUsuarioServicios) }}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            <a href="{{ route('usuarioServicio/atender', $pedido->idUsuarioServicios) }}"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> </button></a>
                            <a href="" data-target="#modal-delete-{{ $pedido->idUsuarioServicios }}" data-toggle="modal">
                                <button class="btn btn-danger">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </a>     
                                @include('vendor.admin.usuarioServicios.modal')
                        </td>
                    </tr>
                           @endforeach
                </table>
            </div>
               {{ $usuarioServicio->render() }}
        </div>
    </div>

@else

    
<div class="box  box-default">
    <div class="box-body no-padding">
            <td>
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                         <h1><span class="label label-primary" >No hay servicios registrados</span></h1>   
                        </div>
                    </div>
                </div>     
            </td>
    </div>
</div>


@endif

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')

@endsection()

@section('js-view')

 <script type="text/javascript" src="{{  asset('js/datatables.js')  }}"></script>
 <script type="text/javascript" src="{{  asset('js/dataTables.bootstrap.js')  }}"></script>
<script>
$(document).ready( function () {
    $('#tipoProductos-dt').DataTable({   

oLanguage: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     " Mostrar _MENU_  Registros",
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