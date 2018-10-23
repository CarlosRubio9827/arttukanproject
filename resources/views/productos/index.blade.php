 @extends("adminlte.layouts.app")

@section('css-view')

 <link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
  <link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>

@endsection()

 @section("main-content")
 
<div class="container" align="center">

  <div class="row"> 
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
           <h3>Listado de Productos
               <a href="{{ route('productos.create') }}" class="btn btn-success" >Nuevo</a>
           </h3>
        </div>
  </div>
 
    <div class="row">
        <div class="col-lg-10 col-md-10 col-xs-10 col-sm-8">
            <div class="table-responsive">
                <table id="productos-dt" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                         
                        <th>Id</th>
                        <th>Nombre Producto</th> 
                        <th>Tipo Producto</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Opciones</th>

                        {{-- <th>Imagen</th> --}}
                    </thead>

                        @foreach ($productos as $producto)
                           
                           <tr> 

                                <td>{{$producto->idProducto}}</td>
                                <td>{{$producto->nombreProducto }}</td>
                                <td>{{$producto->TipoProducto}}</td>
                                <td>{{$producto->stock}}</td>
                                <td>
                                  <img src="{{ asset('images/'.$producto->imagen) }}" alt="{{ $producto->nombreProducto }}" height="75px" width="75px" class="img-thumbnail">
                                </td>

                                <td> 
                                  
                               <a href="{{ route('productos.edit', $producto->idProducto)  }}"><button class="btn btn-primary">Editar</button></a>

                               <a href="" data-target="#modal-delete-{{ $producto->idProducto }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>                              

                                </td>
                               
                           </tr>

                           @include('productos.modal')

                        @endforeach

                </table>

            </div>
            {{ $productos->render() }}
        </div>
    </div>          
</div>
    

@endsection()

@section('js-view')

 <script type="text/javascript" src="{{  asset('js/datatables.js')  }}"></script>
 <script type="text/javascript" src="{{  asset('js/dataTables.bootstrap.js')  }}"></script>
<script>
$(document).ready( function () {
    $('#productos-dt').DataTable({   

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