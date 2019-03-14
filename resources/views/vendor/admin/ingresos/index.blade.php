 @extends("vendor.adminlte.layouts.app")


 @section('css-view')


@endsection()

@section('htmlheader_title')
    Ingresos 
@endsection
 
@section('contentheader_title')

@endsection



 @section("main-content")
 
 <section class="content">
            <!-- Your Page Content Here -->
        <div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
 
				<!-- Default box -->
				<div class="box box-danger">
					<div class="box-header with-border">
                            <b>Ingresos</b> <a href="{{ route('ingresos.create') }}"><button class="btn btn-success"> Nuevo <i class="fa fa-plus"></i></button></a> 
                             
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                              Exportar
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="{{ route('ingresos.pdf') }}">PDF</a></li>
                                        <li><a href="#">Excel</a></li>
                                    </ul>
                    </div>

					<div class="box-body">
 
                    <div class="table-responsive">
                        <table id="ingresos-dt" class="table table-striped table-bordered table-condensed table-hover" WIDTH="700">
                            <thead>
                                
                                <th>Id</th>
                                <th>Fecha - Hora</th> 
                                <th>Estado</th>
                                <th>Opciones</th>

                            </thead> 

                                @foreach ($ingresos as $ingreso)
                                
                                <tr> 
         
                                        <td style="text-align:center;">{{$ingreso->idIngreso}}</td>
                                        <td style="text-align:center;">{{$ingreso->fechaHora }}</td>
                                        <td style="text-align:center;">{{$ingreso->estado}}</td>
                                        
                                        <td style="text-align:center;"> 
                                        
                                    <a href="{{ route('ingresos.show', $ingreso->idIngreso)  }}"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                                    <a href="" data-target="#modal-delete-{{ $ingreso->idIngreso }}" data-toggle="modal">
                                    <button class="btn btn-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true">
                                    </i>
                                    </button>
                                    </a>     

                                    @include('vendor.admin.ingresos.modal')
                                        </td>
                                    
                                </tr>

                                
                                @endforeach

                        </table>

                    </div>
                    {{ $ingresos->render() }}

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