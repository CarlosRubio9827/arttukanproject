 @extends("vendor.adminlte.layouts.app")
 

@section('htmlheader_title')
    Articulos
@endsection
 
@section('contentheader_title')
 
@endsection

 @section("main-content") 

 
 <section class="content">
        <!-- Your Page Content Here -->
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12 col-md-offset ">

            <!-- Default box -->
                <div class="box box-warning" style="width: 950px";>
                    <div class="box-header with-border">
                        <b>Articulos</b> <a href="{{ route('productos.create') }}"><button class="btn btn-success"> Nuevo <i class="fa fa-plus"></i></button></a>         
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Exportar
                          <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="{{ route('productosPdf') }}">PDF</a></li>
                          <li><a href="#">Excel</a></li>
                      </ul>
                    </div>
                    <div class="box-body">
                            @if (count($productos))
                        <div class="table-responsive">
                                <table id="productos-dt" class="table table-striped table-bordered table-condensed table-hover" WIDTH="900">
                                    <thead>
                                          
                                        <th>Id</th>
                                        <th>Código</th>
                                        <th>Nombre Articulos</th> 
                                        <th>Precio</th>
                                        <th>Producto</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Opciones</th>
                
                                        {{-- <th>Imagen</th> --}}
                                    </thead>
                 
                                        @foreach ($productos as $producto)
                                           <tr>  
                                                <td style="text-align:center;">{{$producto->idProducto}}</td>
                                                <td style="text-align:center;">{{$producto->codigoProducto}}</td>
                                                <td style="text-align:center;">{{$producto->nombreProducto }}</td>
                                                <td style="text-align:center;">${{number_format($producto->precio) }}</td> 
                                                <td style="text-align:center;">{{$producto->tipoProducto}} </td>
                                                <td style="text-align:center;">{{$producto->stock}}</td>
                                                <td> 
                                                  <img src="{{ asset('images/'.$producto->imagen) }}" alt="{{ $producto->nombreProducto }}" height="75px" width="75px" class="img-thumbnail">
                                                </td>
                                                <td style="text-align:center;">   
                                                    <a href="{{route('productos.show',  $producto->idProducto)}}"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a> 
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
                <!-- /.box-body -->
                </div>
                @else
    
                <div class="card card-nav-tabs text-center">
                    <div class="card-body">
                      <h1 style="color:#000">Actualmente no tienes registrados articulos</h1>
                    </div> 
                </div>
                    @endif            </div>
        </div>
    </div>
</section><!-- /.content -->        
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Include this after the sweet alert js file -->
@include('sweet::alert') 

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