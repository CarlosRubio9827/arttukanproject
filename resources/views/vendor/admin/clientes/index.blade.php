 @extends("vendor.adminlte.layouts.app")

 @section('css-view')

@endsection()

@section('htmlheader_title')
    clientes
@endsection
 
@section('contentheader_title')

@endsection

 @section("main-content") 

 
 <section class="content">
    <!-- Your Page Content Here -->
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12 col-md-offset">
 
                <!-- Default box --> 
                <div class="box box-success" >
                    <div class="box-header with-border">
                        <b>Clientes</b> <a href="{{ route('clientes.create') }}"><button class="btn btn-success"> Nuevo <i class="fa fa-plus"></i></button></a> 
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Exportar
                          <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="{{ route('clientes.pdf') }}">PDF</a></li>
                          <li><a href="#">Excel</a></li>
                      </ul>
                    </div> 
                    <div class="box-body" >
                        <div class="table-responsive">
                            <table id="clientes-dt" class="table table-striped table-bordered table-condensed table-hover" >
                                <thead>
                                    <th>Nuip</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th> 
                                    <th>Email</th> 
                                    <th>Telefono</th>
                                    <th>Opciones</th>

                                </thead>
                                    @foreach ($clientes as $cliente)
                                <tr> 
                                    <td>{{$cliente->numDocumento}}</td>
                                    <td>{{$cliente->nombres }}</td>
                                    <td>{{$cliente->apellidos }}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->telefono}}</td>

                                    <td> 
                                        <a href="{{ route('clientes.show', $cliente->id)  }}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="" data-target="#modal-delete-{{ $cliente->id }}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                            @include('vendor.admin.clientes.modal')
                                    </td>
                                </tr>
                                     @endforeach
                            </table>
                        </div>
                                {{ $clientes->render() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</section><!-- /.content -->        

 @endsection()


@section('js-view')

 <script type="text/javascript" src="{{  asset('js/datatables.js')  }}"></script>
 <script type="text/javascript" src="{{  asset('js/dataTables.bootstrap.js')  }}"></script>
<script>
$(document).ready( function () {
    $('#clientes-dt').DataTable({   

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