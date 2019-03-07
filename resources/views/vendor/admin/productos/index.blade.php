 @extends("vendor.adminlte.layouts.app")

 

@section('css-view')

 <link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
  <link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
@endsection()

@section('htmlheader_title')
    Productos
@endsection
 
@section('contentheader_title')
    Productos <a href="{{ route('productos.create') }}" class="btn btn-success" > Nuevo</a>
@endsection

 @section("main-content") 
 
<div class="container" >
  
 <div class="card bg-light mb-3" style="max-width: 95rem;">
  <div class="card-header">
    <h4>Registrar Producto</h4>
  </div>

  <div class="card-body">
            <div class="table-responsive">
                <table id="productos-dt" class="table table-striped table-bordered table-condensed table-hover" WIDTH="900">
                    <thead>
                          
                        <th>Id</th>
                        <th>Código</th>
                        <th>Nombre Producto</th> 
                        <th>Precio</th>
                        <th>Tipo Producto</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Opciones</th>

                        {{-- <th>Imagen</th> --}}
                    </thead>
 

                        @foreach ($productos as $producto)
                           
                           <tr>  

                                <td>{{$producto->idProducto}}</td>
                                <td>{{$producto->codigoProducto}}</td>
                                <td>{{$producto->nombreProducto }}</td>
                                <td>{{$producto->precio }}</td>
                                <td>{{$producto->idTipoProducto}} - {{ $producto->TipoProducto }}</td>
                                <td>{{$producto->stock}}</td>
                                <td>
                                  <img src="{{ asset('images/'.$producto->imagen) }}" alt="{{ $producto->nombreProducto }}" height="75px" width="75px" class="img-thumbnail">
                                </td>

                                <td> 
                                  
                                    <a href="{{ route('productos.edit', $producto->idProducto)  }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                                    <a href="" data-target="#modal-delete-{{ $producto->idProducto }}" data-toggle="modal"><button class="btn btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i></button></a>                              
                                        @include('vendor.admin.productos.modal')
                                </td>
                               
                           </tr>
 
                           

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
    "sLengthMenu":     "Mostrar _MENU_ Registros",
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