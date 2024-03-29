 @extends("adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()
 
@section("main-content")

  <div class="row">
    <div class="col-md-6 col-xs-12 col-lg6 col-sm-6">
        <h3>Nueva venta</h3>
        
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

                {!! Form::open(['route' => 'ventas.store', 'method'=>'POST','autocomplete'=>'off']) !!}
                {{Form::token()}}

                <div class="row">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Productos</label>
                                <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search='true'>
                                            @foreach ($productos as $producto)
                                    <option value="{{ $producto->idProducto }}_{{ $producto->stock }}_{{ $producto->precio }}">{{ $producto->producto}}</option>
                                            @endforeach
                                </select> 
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="cantidad">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <div class="form-group">
                                <label for="cantidad">Stock</label>
                                <input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <div class="form-group">
                                <label for="precioVenta">Precio Venta</label>
                                <input type="number" disabled name="pprecioVenta" id="pprecioVenta" class="form-control" placeholder="Precio Venta">
                            </div>
                        </div>

                    

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <div class="form-group">
                                        <br>
                                <button class="btn btn-primary" id="bt_add" type="button">Agregar al detalle</button>
                            </div>
                        </div>    
                    
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <table id="detalles" class="table table-striped table-responsive table-hover table-condensed table-bordered">
                                    <thead style="background-color: #A9D0F5">
                                        <th>Opciones</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Venta</th>
                                    </thead>
                                    <tfoot>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th><h4 id="total">$/. 0.00</h4> <input type="hidden" name="totalVenta" id="totalVenta"></th>
                                    </tfoot>
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
    subtotal=[];

    $('#guardar').hide();

    $('#pidProducto').change(mostrarValores());

    function mostrarValores(){
        datosProductos=document.getElementById('pidProducto').value.split('_');
        $('#pprecioVenta').val(datosProductos[2]);
        $('#pstock').val(datosProductos[1]);
    }
 
    function agregar(){


        datosProductos=document.getElementById('pidProducto').value.split('_');
        idProducto=datosProductos[0]
        producto=$('#pidProducto option:selected').text();

        cantidad=$('#pcantidad').val();

        precioVenta=$('#pprecioVenta').val();

        stock=$('#pstock').val();


        if (idProducto != "" && cantidad != "" && cantidad > 0  && precioVenta != "") {

            subtotal[cont]=(cantidad*precioVenta);
            total =total+subtotal[cont];


            if (stock>=cantidad) {
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precioVenta[]" value="'+precioVenta+'"></td></tr>';
            cont++;
            limpiar();
            $('#total').html("S/. "+total );
            $('#totalVenta').val(total);
            evaluar();
            $('#detalles').append(fila);
    
            }else{
                alert("La cantidad a vender supera el limite");
            }
            
        }else{
            alert("Error al ingresar el detalle de la venta, revise los datos del articulo");
        } 
    }

    function limpiar(){
      $('#pcantidad').val("");
      $('#precioVenta').val("");
    }

    function evaluar(){
        if (total>0) {
            $('#guardar').show();
        }else{
            $('#guardar').hide();
        } 
    }

    function eliminar(index){
        total=total - subtotal[index];
        $('#total').html("S/. "+total);
        $('#totalVenta').val(total);
        $('#fila' + index).remove();
        evaluar();
    }

</script>

@endsection()


@endsection