 @extends("vendor.adminlte.layouts.app")


@section('contentheader_title')
       Tipos De Productos
@endsection


@section('css-view')

 <link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
  <link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>

@endsection()
 
 @section("main-content")
 
<div class="container" align="center">
  <div class="row"> 
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
           <h3>Listado de Tipo Productos
               <a href="{{ route('tipoProductos.create') }}" class="btn btn-success" >Nuevo Tipo de Producto</a>

           </h3>
 
        </div>
    </div> 
 
    <div class="row">
        <div class="col-lg-10 col-md-10 col-xs-10 col-sm-8">
            <div class="table-responsive">
                <table id="tipoProductos-dt" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th >Id</th>
                        <th>Nombre Tipo Producto</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                        {{-- <th>Imagen</th> --}}
                    </thead>

                        @foreach ($tipoProductos as $tipoProducto)
                           <tr> 
                                <td>{{$tipoProducto->idTipoProducto}}</td>
                                <td>{{$tipoProducto->nombreTipoProducto }}</td>
                                <td>{{$tipoProducto->descripcionTipoProducto}}</td>
                                <td> 
 
                               <a href="{{ route('tipoProductos.show', $tipoProducto->idTipoProducto)  }}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>

                               <a href="{{ route('tipoProductos.edit', $tipoProducto->idTipoProducto)  }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button></a>

                               <a href="" data-target="#modal-delete-{{ $tipoProducto->idTipoProducto }}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button></a>                              
                               @include('vendor.admin.tipoProductos.modal')

                                </td>
                               
                           </tr> 
                        @endforeach
                </table>
            </div>
            {{ $tipoProductos->render() }}
        </div>
    </div>          


</div>
    

@endsection()

@section('js-view')

 <script type="text/javascript" src="{{  asset('js/datatables.js')  }}"></script>
 <script type="text/javascript" src="{{  asset('js/dataTables.bootstrap.js')  }}"></script>
<script>
$(document).ready( function () {
    $('#tipoProductos-dt').DataTable({   

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