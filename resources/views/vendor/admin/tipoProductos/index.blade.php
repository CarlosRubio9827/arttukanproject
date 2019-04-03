 @extends("vendor.adminlte.layouts.app")

@section('css-view')

@endsection()
 
@section('htmlheader_title')
     Productos
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
				<div class="box box-primary" style="width: 900px";>
					<div class="box-header with-border">
                       <b> Productos</b> <a href="{{ route('tipoProductos.create') }}"><button class="btn btn-success"> Nuevo <i class="fa fa-plus"></i></button></a> 
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Exportar
                      <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="{{ route('tiposProductosPdf') }}">PDF</a></li>
                            <li><a href="#">Excel</a></li>
                        </ul>
                    </div>
					<div class="box-body">
                        @if (count($tipoProductos))
                            
                        <div class="table-responsive">
                            <table id="tipoProductos-dt" class="table table-striped table-bordered table-condensed table-hover" WIDTH="900">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre Producto</th>
                                    <th>Descripcion</th>
                                    <th>Opciones</th>
                                    {{-- <th>Imagen</th> --}}
                                </thead> 
                                    @foreach ($tipoProductos as $tipoProducto)
                                    <tr> 
                                        <td style="text-align:center;">{{$tipoProducto->idTipoProducto}}</td>
                                        <td style="text-align:center;">{{$tipoProducto->nombreTipoProducto }}</td>
                                        <td style="text-align:center;">{{$tipoProducto->descripcionTipoProducto}}</td>
                                        <td style="text-align:center;"> 
            
                                        <a href="{{ route('tipoProductos.show', $tipoProducto->idTipoProducto)  }}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                                        <a href="{{ route('tipoProductos.edit', $tipoProducto->idTipoProducto)  }}"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                                        <a href="" data-target="#modal-delete-{{ $tipoProducto->idTipoProducto }}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>                              
                                        @include('vendor.admin.tipoProductos.modal')
                                        </td>
                                    </tr> 
                                    @endforeach
                            </table>
                        </div>
                    {{ $tipoProductos->render() }}

                </div>
					<!-- /.box-body -->
				</div>
                @else
    
                <div class="card card-nav-tabs text-center">
                    <div class="card-body">
                      <h1 style="color:#000">Actualmente no tienes registrados Productos</h1>
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