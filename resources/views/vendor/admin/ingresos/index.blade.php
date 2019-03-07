 @extends("vendor.adminlte.layouts.app")


 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
<link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>

@endsection()

@section('htmlheader_title')
    Ingresos 
@endsection
 
@section('contentheader_title')
    Ingresos <a href="{{ route('ingresos.create') }}" class="btn btn-success" > Nuevo</a>
@endsection

 @section("main-content")
 <a href="{{ url('ingresosPdf') }}" class="btn btn-sm btn-primary">
            Descargar productos en PDF
        </a>
 
  <div class="container" >
  
  <div class="card bg-light mb-3" style="max-width: 95rem;">
  <div class="card-header">
    <h4>Registrar Ingreso</h4>
  </div>

  <div class="card-body">

             <div class="table-responsive">
                <table id="ingresos-dt" class="table table-striped table-bordered table-condensed table-hover" WIDTH="900">
                    <thead>
                         
                        <th>Id</th>
                        <th>Fecha - Hora</th> 
                        <th>Estado</th>
                        <th>Opciones</th>

                    </thead> 

                        @foreach ($ingresos as $ingreso)
                           
                           <tr> 
 
                                <td>{{$ingreso->idIngreso}}</td>
                                <td>{{$ingreso->fechaHora }}</td>
                                <td>{{$ingreso->estado}}</td>
                                
                                <td> 
                                  
                               <a href="{{ route('ingresos.show', $ingreso->idIngreso)  }}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                               <a href="" data-target="#modal-delete-{{ $ingreso->idIngreso }}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>                              
                              @include('vendor.admin.ingresos.modal')
                                </td>
                               
                           </tr>

                           
                        @endforeach

                </table>

            </div>
            {{ $ingresos->render() }}
        </div>
    </div>          


@endsection()



@section('js-view')

 <script type="text/javascript" src="{{  asset('js/datatables.js')  }}"></script>
 <script type="text/javascript" src="{{  asset('js/dataTables.bootstrap.js')  }}"></script>
<script>
$(document).ready( function () {
    $('#ingresos-dt').DataTable({   

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