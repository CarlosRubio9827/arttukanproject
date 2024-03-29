 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()
 
@section('htmlheader_title')
    Registrar Venta
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
                        <h3 class="box-title"> Ventas </h3>
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
                        
                                        {!! Form::open(['route' => 'ventas.store', 'method'=>'POST','autocomplete'=>'off']) !!}
                                        {{Form::token()}}
                        
                                        <div class="row">
                                            <div class="panel-body"> 
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label><b>Cliente</b></label>
                                                        <select name="idCliente" class="form-control selectpicker" id="pidCliente" data-live-search='true'>
                                                            <option value="1" >Seleccione Cliente</option>    
                                                                @foreach ($clientes as $cliente)
                                                            <option value="{{ $cliente->id }}">{{$cliente->numDocumento}} - {{ $cliente->nombres}} {{$cliente->apellidos}}</option>
                                                                @endforeach
                                                        </select> 
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label><b>Producto</b></label>
                                                        <select name="pidProducto" class="form-control selectpicker" id="pidProducto" data-live-search='true'>
                                                            <option value="1" >Seleccione producto</option>    
                                                            @foreach ($productos as $producto)
                                                            <option value="{{ $producto->idProducto }}_{{ $producto->stock }}_{{ $producto->precio }}">{{ $producto->producto}}</option>
                                                                @endforeach
                                                        </select> 
                                                    </div>
                                                </div>
                        
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                                    <div class="form-group">
                                                        <label for="cantidad"><b>Cantidad</b></label>
                                                        <input type="text"  name="pcantidad" id="pcantidad" class="input-number form-control" placeholder="Cantidad">
                                                    </div>
                                                </div>
                         
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                                    <div class="form-group">
                                                        <label for="stock"><b>Stock</b></label>
                                                        <input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock">
                                                    </div>
                                                </div>
                        
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                                    <div class="form-group">
                                                        <label for="precioVenta"><b>Precio Producto</b></label>
                                                        <input type="number" disabled name="pprecioVenta" id="pprecioVenta" class="form-control" placeholder="Precio Venta">
                                                    </div>
                                                </div>
                                           
                                                <div class="panel-body">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                                        <br>
                                                        <button class="btn btn-primary" id="bt_add" type="button" >Agregar al detalle</button>
                                                    </div>
                                                </div>

                                              </div>

                                                <div class="panel-body">
                                                    <table  id="detalles" class="table table-bordered" WIDTH="2000">
                                                        <thead class="thead-dark">
                                                            <th>Opciones</th>
                                                            <th>Producto</th>
                                                            <th>Cantidad</th>
                                                            <th>Precio Venta</th>
                                                        </thead>
                                                        <tfoot>
                                                           <th>Total</th>
                                                           <th></th>
                                                            <th></th>
                                                        <th><h4 id="total">$ </h4> <input type="hidden" name="totalVenta" id="totalVenta"></th>
                                                        </tfoot>
                                                        <tbody>
                                                                
                                                        </tbody>
                                                    </table>                               
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
                                                <button class="btn btn-danger btn-md btn-block " type="button" onclick="history.back()">Cancelar</button>
                                            </div>
                                        </div>
                    </div>    
                </div>
                <!-- /.box-body -->
            </div>
                <!-- /.box -->
        </div>
</section><!-- /.content -->        


@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.js"></script>
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
        
      $('#pidProducto').change(function(){
        datosProductos=document.getElementById('pidProducto').value.split('_');
        $('#pstock').val(datosProductos[1]);
        $('#pprecioVenta').val(datosProductos[2]);
                });
    });

    var cont=0;
    total = 0;
    subtotal=[];

    $('#guardar').hide();

    

    function agregar(){
 
        datosProductos=document.getElementById('pidProducto').value.split('_');
        idProducto=datosProductos[0]
        producto=$('#pidProducto option:selected').text();
        cliente=$('#pidCliente option:selected').text();
         cantidad=$('#pcantidad').val();
        var cantidadNum = parseInt(cantidad);
        

        precioVenta=$('#pprecioVenta').val();
        var precioVentaNum = parseInt(precioVenta);
        stock=$('#pstock').val();
        var stockNum = parseInt(stock);

        if (idProducto != "" && cantidad != "" && cliente != "Seleccione Cliente") {

            subtotal[cont]=(cantidadNum*precioVentaNum);
            total =total+subtotal[cont];

            if (cantidadNum<=stockNum) {
            var fila='<tr class="selected" id="fila'
            +cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont
            +');">X</button></td><td><input  type="hidden" name="idProducto[]" value="'+idProducto
            +'">'+producto+'</td><td><input   type="number" name="cantidad[]" value="'+cantidad
            +'"></td><td><input   type="number" name="precioVenta[]" value="'+precioVentaNum+'"></td></tr>';
            
            cont++;
            limpiar();
            $('#total').html("$ "+total );
            $('#totalVenta').val(total);
            evaluar();
            $('#detalles').append(fila);
    
            }else{
                swal("Error", "Revise Bien los datos de registro", "error");
                
            }
            
        }else{
            swal("Error","Error al ingresar el detalle de la venta, revise bien los datos",'error');
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

@endsection()

