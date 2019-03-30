 @extends("vendor.adminlte.layouts.app")

 @section('css-view')

 <link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
  <link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>

@endsection()

@section('htmlheader_title')
    Mis Pedidos
@endsection

 @section("contentheader_title")
<div class="text-center">
    <p>Lista de mis pedidos</p>
</div>
 @endsection()

 @section('main-content')

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
                   
        </div>
    </div>
    @if(count($pedidos))
 <div class="box box-success">
     <div class="box-header with-border">
        Pedidos
     </div>
     <div class="box-body">
          <div class="table-responsive">
                <table id="ventas-dt" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Fecha - Hora</th>
                        <th>Total</th> 
                        <th>Estado</th>
                        <th>Opciones</th>
                    </thead>
                        @foreach ($pedidos as $venta)
                            <tr> 
                                <td>{{$venta->idPedido}}</td>
                                <td>{{$venta->fechaHora }}</td>
                                <td>${{number_format($venta->totalPedido) }}</td>
                                <td>{{$venta->estado}}</td>
                                <td> 
                                   <a href="{{ route('pedidos.show', $venta->idPedido)  }}"><button class="btn btn-primary">Detalles</button></a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
            {{ $pedidos->render() }}
     </div>
 </div>
         

    @else
	<div class="card card-nav-tabs text-center">
        <div class="card-body">
      <h1 style="color:#000">Actualmente no tienes pedidos</h1>
        </div> 
    </div>

@endif
     
 @endsection

              







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