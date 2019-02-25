 @extends("adminlte.layouts.app")

 @section('css-view')

 <link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
  <link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>

@endsection()

 @section("contentheader_title")

    <div class="row">
        <div class="col-md-8 col-lg-8 col-xs-12 col-sm-8">
                @if (Session::has('info'))
                  <div class="alert alert-info">
                      <button type="button" class="close" data-dismiss="alert">
                          <span>&times;</span>
                      </button>
                      {{ Session::get('info') }}
                  </div>
                @endif
                    <h3>Listado de Ventas <a href="{{ route('ventas.create') }}" ><button type="button" class="btn btn-success">Nuevo</button></a></h3>
                   
        </div>
    </div>
                
        <div class="row">
           <div class="col-lg-12 col-md-12 col-xs-12 col-sm-10">
             <div class="table-responsive">
                <table id="ventas-dt" class="table table-striped table-bordered table-condensed table-hover">
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
                                   <a href="{{ route('ventas.show', $venta->idVenta)  }}"><button class="btn btn-primary">Detalles</button></a>
                                   <a href="" data-target="#modal-delete-{{ $venta->idVenta }}" data-toggle="modal"><button class="btn btn-danger">Anular Venta</button></a>
                                </td>
                           </tr>
                           @include('ventas.modal')
                        @endforeach
                </table>
            </div>
            {{ $ventas->render() }}
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