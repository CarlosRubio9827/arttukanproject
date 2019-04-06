 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()

@section('htmlheader_title')
    Registrar Producción
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
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"> Producción </h3>
					</div>
				<div class="box-body">

                    <div class="container-fluid">
        
                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>

                        @endif
  
                {!! Form::open(['route' => 'ingresos.store', 'method'=>'POST','autocomplete'=>'off']) !!}
                {{Form::token()}}

                <div class="row">
                        <div class="panel-body">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                                    <input type="number" min="1" name="pcantidad" id="pcantidad" class="input-number form-control" placeholder="cantidad">

                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" id="bt_add" type="button">Agregar al detalle</button>
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

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
                            <div class="form-group">
                                <input  type="hidden" value="{{ csrf_token() }}" name="_token">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </div>

                    </div> 

                        {!! Form::close() !!}       
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="form-group">
                        <input  type="hidden" value="{{ csrf_token() }}" name="_token">
                        <button class="btn btn-danger btn-md btn-block " type="button" onclick="history.back()">Volver</button>
                    </div>
                </div>

            </div>

                        
                    </div>
					<!-- /.box-body -->
	            </div>
				<!-- /.box -->
            </div>
        </div>
    </div>
</section><!-- /.content -->        




    

@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Include this after the sweet alert js file -->
        @include('sweet::alert')
<script> 

    $(document).ready(function(){
        $('#bt_add').click(function(){
            agregar();
        });
        
        $('.input-number').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
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
            swal("Error", "Revise Bien los datos de registro", "error");
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