 @extends("vendor.adminlte.layouts.app")

 @section('css-view')

 <link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
  <link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>

@endsection()

@section('htmlheader_title')
    Ventas
@endsection
 
@section('contentheader_title')
   Ventas <a href="{{ route('ventas.create') }}" class="btn btn-success" > Nuevo</a>
@endsection

 @section("main-content") 
 
<div class="container" >
  
 <div class="card bg-light mb-3" style="max-width: 80rem;">
  <div class="card-header">
    <h4>Registrar Venta</h4>
  </div>

    <div class="card-body">
            <div class="table-responsive">
                <table id="ventas-dt" class="table table-striped table-bordered table-condensed table-hover" width="750">
                    <thead>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Total</th> 
                        <th>Estado</th> 
                        <th>Opciones</th>
                    </thead>
                        @foreach ($ventas as $venta)
                           <tr> 
                                <td>{{$venta->idVenta}}</td>
                                <td>{{$venta->fechaHora }}</td>
                                <td>{{$venta->totalVenta }}</td>
                                <td>{{$venta->estado}}</td>
                                <td> 
                                   <a href="{{ route('ventas.show', $venta->idVenta)  }}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                   <a href="" data-target="#modal-delete-{{ $venta->idVenta }}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                   @include('vendor.admin.ventas.modal')
                                </td>
                           </tr>
                        @endforeach
                </table>
            </div>
            {{ $ventas->render() }}
    </div>
   </div> 
  </div>         

@endsection()






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