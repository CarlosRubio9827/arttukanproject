 @extends("vendor.adminlte.layouts.app")

@section('css-view')

@endsection()
 
@section('htmlheader_title')
Servicios
@endsection

@section('contentheader_title')
<div class="text-center">
    <b>Servicios - ArtTukan</b> 
</div>

@endsection
  
 @section("main-content")
 @if(count($servicios))

 <div class="container text-center">
    <div class="row" id="productos">
        @foreach ($servicios as $servicio)

        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="producto white-panel">
                <h3>{{$servicio->nombre}}</h3><hr>
                <img src="{{asset('images/'.$servicio->imagen)}}" alt="Imagen del servicio" width="130px" height="170px">
                <div class="producto-info panel">
                    <p>{{$servicio->descripcion}}</p>
                    <p><span class="label label-success">Precio: ${{ number_format($servicio->precio)}}</span></p>
                    <p>
                    <a class="btn btn-primary" href="{{route('servicios.show', $servicio->idServicio)}}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning" href="{{route('usuarioServicio/store', $servicio->idServicio )}}"><i class="fa fa-plus"></i> Solicitar</a>
                </div>  
            </div>
        </div> 
        @endforeach
    </div>
</div>       
@else

    
<div class="box  box-default">
    <div class="box-body no-padding">
            <td>
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                         <h1><span class="label label-primary" >No hay servicios registrados</span></h1>   
                        </div>
                    </div>
                </div>     
            </td>
    </div>
</div>


@endif

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