 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()
 
@section("main-content")

  <div class="row">
    <div class="col-md-6 col-xs-12 col-lg6 col-sm-6">
        <h3>Nuevo Ingreso</h3>
        
        @if (count($errors)>0)
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>

        @endif
    </div>
  </div>

                {!! Form::open(['route' => 'ingresos.store', 'method'=>'POST','autocomplete'=>'off']) !!}
                {{Form::token()}}

                <div class="row">

                    <div class="panel panel-primary" >
                        <div class="panel-body">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Producto</label>
                                    <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search='true'>
                                        @foreach ($productos as $producto)
                                        <option value="{{ $producto->idProducto }}">{{ $producto->producto }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">
                                </div>
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                <div class="form-group">
                                <button class="btn btn-primary" id="bt_add" type="button">Agregar al detalle</button>
                                </div>
                             </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <table id="detalles" class="table table-striped table-responsive table-hover table-condensed table-bordered">
                                    <thead>
                                        <th>Opciones</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                    </thead>

                                    <tbody>
                                        
                                    </tbody>
                                </table>                               
                            </div>

                        </div>
                       
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
                        <div class="form-group">
                            <input  type="hidden" value="{{ csrf_token() }}" name="_token">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <a href="{{ route('productos.index') }}"><button  class="btn btn-danger" >Cancelar</button></a>
                        </div>
                    </div>

                </div>

                    {!! Form::close() !!}       


@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>

<script> 

    $(document).ready(function(){
        $('#bt_add').click(function(){
            agregar();
        });
    });
    var cont=0;

    total = 0;

    $('#guardar').hide();
 
    function agregar(){
        idProducto=$('#pidProducto').val();
        producto=$('#pidProducto option:selected').text();
        cantidad=$('#pcantidad').val();

        if (idProducto != "" && cantidad != "" && cantidad > 0 && producto != "") {
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td></tr>';
            cont++;
            limpiar();
            evaluar();
            $('#detalles').append(fila);

        }else{
            alert("Error al ingresar el detalle del ingreso, revise los datos del articulo");
        } 
    }

    function limpiar(){
      $('#pcantidad').val("");
    }

    function evaluar(){
        if (cont>0) {
            $('#guardar').show();
        }else{
            $('#guardar').hide();
        }
    }

    function eliminar(index){
        $('#fila' + index).remove();
    }

</script>

@endsection()


@endsection