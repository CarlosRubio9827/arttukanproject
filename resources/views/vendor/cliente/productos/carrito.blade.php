@extends("vendor.adminlte.layouts.app")
@section('htmlheader_title')
    Carrito de Compras
@endsection
 
@section('contentheader_title')


	<div class="text-center">
			<strong><img width="35px" src="{{asset('img/iconos/icons8-carrito-de-compras-50.png')}}" > Carrito de Cotización</strong> 
	</div>


@endsection

@section('main-content') 
	<div class="container text-center">
		
			<br>
			<br>

		
	@if(count($cart))


			<div class="card  text-center">
				  <div class="card-header card-header-primary"> 
						<a href="{{route('vaciar-carrito')}}" class="btn btn-danger  btn-sm" title="Vaciar carrito">Vaciar Carrito <i class="fa fa-trash"></i></a>
				  </div>
				  <div class="card-body">
						<div class="table-carrito">
								<div class="table-responsive">

										<table WIDTH="500" class=" table table-striped table-bordered table-condensed table-hover" id="tablecotizacion" name ="tablecotizacion" style="color:#000">
												<thead >
													<th>Imágen</th>
													<th>Nombre</th>
													<th>Descripcion</th>
													<th>Precio</th>
													<th>Cantidad</th>
													<th>Subtotal</th>
													<th>Quitar</th>						
												</thead>
												<tbody>
													
													@foreach($cart as $item)	
														<tr>
															<td > <img width="80" height="80" src="{{asset('images/'.$item->imagen)}}"></td>
															<td scope="row">{{$item->nombreProducto}}</td>
															<td scope="row">{{$item->descripcion}}</td>
															<td scope="row">${{number_format($item->precio)}}</td>
															<td scope="row">
													
																<input 
																		type="number"
																		min="1"
																		max="100"
																		value="{{ $item->cantidad }}"
																		id="producto_{{ $item->idProducto }}"
																	>
																	<a 
																		href="#" 
																		class="btn btn-warning btn-update-item"
																		data-href="{{ route('actualizar-producto', $item->idProducto) }}"
																		data-id = "{{ $item->idProducto }}"
																	>
																		<i class="fa fa-refresh"></i>
																	</a>
																</td>
															<td scope="row" id="subtotalcot">${{number_format($item->precio * $item->cantidad)}}</td>
															<td scope="row">
																<a href="{{route('eliminar-producto',$item->idProducto)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
															</td>
								
														</tr>	
								
													@endforeach	
												</tbody>
								
											</table>
					
								</div>
		</div>				
					  <h3>
							<span class="label label-success">
								Total: ${{number_format($total)}}
							</span>
						</h3>
			</div>
		</div>
		<p>
				<a href="{{route('catalogo')}}" class="btn btn-primary btn-sm">Agregar otro producto </a>
				<a href="{{route('detalle-pedido')}}"><button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Continuar</button></a> 
			</p>
		</div>
		@else 

		<div class="card card-nav-tabs text-center">
				  
				  <div class="card-body">
				<h1 style="color:#000">No se han selecionado productos.</h1>
				<a href="{{route('catalogo')}}" class="btn btn-primary btn-sm"><i class="fa fa-chevron-circle-left"></i> Volver </a>

					</div>
					
				
		</div>

		@endif
 

@endsection

@section('js-view')

<script>
$(document).ready(function(){

	//Actualizar Item
	$(".btn-update-item").on('click', function(e){
		e.preventDefault();
	

		var idProducto = $(this).data("id");
		
		var href = $(this).data('href');
		
		var cantidad = $('#producto_' + idProducto).val();
		alert(idProducto);
		alert(cantidad);
		alert(href);
	
		window.location.href = href + "/" + cantidad;
	
	})

});
</script>
		
@endsection