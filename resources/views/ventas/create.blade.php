@extends("adminlte.layouts.app")
 
 @section("contentheader_title")

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	Nueva Venta
			</div>

			<div class="panel-body">
				{!! Form::open(['route' => 'detalleVentas.store', 'files' => true]) !!}
				
				<div class="form-group">
                    
                    {!! Form::label('nombreProducto', 'Nombre Producto') !!}
					
					<select name="idProducto" id="idProducto" class="from-control selectpicker">
						@foreach ($productos as $producto)
							
							<option value="{{ $producto->idProducto }}_{{ $producto->stock }}_{{ $producto->precio }}"> {{ $producto->nombreProducto }} </option>
						@endforeach
					</select>
				</div>
                
                <div class="form-group">
                {{ Form::label('cantidad','Cantidad') }}
			     {{ Form::number('cantidad', 'Cantidad') }}    	
                </div>
				
                <div class="form-group">
                {{ Form::label('stock','Stock') }}
			     {{ Form::number('stock', 'Stock',array('disabled')) }}    	
                </div>

				<div class="form-group">
					
				{{ Form::label('precioVenta','Precio Venta') }}
			     {{ Form::number('precioVenta', 'Precio Venta',array('disabled')) }}
			 
				</div>
				<div class="form-group">
					<button type="button" id="guardar" class="btn btn-primary">Guardar</button>
				</div>

				
				<div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
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
                        <th><h4 id="total">S/. 0.00</h4><input type="hidden" name="totalVenta" id="totalVenta"></th>
 					</tfoot>
 					<tbody>
 						
 					</tbody>
					</table>
				</div>

                    {!! Form::close() !!}

			</div>
        </div>
    </div>
@push('scripts')
    <script>
    	$(document).ready(function(){
    		$('#guardar').click(function(){
    			agregar();
    		});
    	});

    	var cont=0;
    	total=0;
    	$('#guardar').hidden();
    	$('idProducto').change(mostrarValores);


    	function mostrarValores() {
    		datosProducto=document.getElementById('idProducto').value.split('_');
    		$('#precioVenta').val(datosProducto[2]);
    		$('#stock').val(datosProducto[1]);	
    	}

    	function agregar(){
    		 datosProducto=document.getElementById('idProducto').value.split('_');
    		 idProducto=datosProducto[0];
    		 producto=$('#idProducto option:selected').text();
    		 cantidad=$('#cantidad').val();
    		 precioVenta=$('#precioVenta').val();
    		 stock=$('#stock').val();

             if (idProducto != '' && cantidad != ''&&cantidad>0 && precioVenta!= '') {

             	if (stock>=cantidad) {

             		total=cantidad*precioVenta;

             		var fila='<tr class="selected"id="fila'+cont+'"><td><button> type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idProducto[]"value="'+idProducto+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precioVenta[]" value="'+precioVenta+'"></td></tr>'
             		cont++;
             		limpiar();
             		$('#total').html('S/. ' + total);
             		$('#totalVenta').val(total);
             		evaluar();
             		$('#detalles').append(fila);

             	}else{
             		alert('La cantidad a vender supera el limite');
             	}

             }else{
             	alert("Error al ingresar el detalle de la venta, revise los datos del producto");
             }

    	}

    	function limpiar(){
    		$('#cantidad').val('');
    		$('#precioVenta').val('');

    	}

    	function eliminar(index){
             total = total[index];
             $('#total').html('S/. ' + total);
             $('#totalVenta').val(total);
             $('#fila' + index).remove();
             evaluar();
    	}

    </script>
@endpush

@endsection

