 @extends("adminlte.layouts.app")
 
 @section("contentheader_title")


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if (Session::has('info'))
                  <div class="alert alert-info">
                      <button type="button" class="close" data-dismiss="alert">
                          <span>&times;</span>
                      </button>
                      {{ Session::get('info') }}
                  </div>
                @endif
                <div class="panel-heading" align="center">Listado de Ventas
                	<a href="{{ route('ventas.create') }}" class="btn btn-primary" >Nuevo</a></div>

            
                <div class="panel-body">
                	<table class="table table-hover">
                		<head>
                			<tr>
                				<th><b>ID</b></th>
                				<th><b>Fecha</b></th>
                				<th><b>Impuesto</b></th>
                				<th><b>Total Venta</b></th>
                				<th colspan="3"></th>
                			</tr>
                		</head>
                		<tbody>
 
			                @foreach ($ventas as $venta)
			                <tr>
                                
			                	<td>{{$venta->idVenta}}</td>
			                	<td>{{$venta->fechaHora }}</td>
			                	<td>{{$venta->impuesto}}</td>
                                <td>{{$venta->totalVenta}}</td>

			                	<td><a href="{{ route('ventas.show',$venta->idVenta) }}" class="btn btn-primary" >
                                Ver</a></td>

			                	<td><a href="{{ route('ventas.edit',$venta->idVenta) }}" class="btn btn-primary" >
                                Editar</a></td>
			                	<td>
                        {!! Form::model($venta, ['route' => ['ventas.destroy', $venta->idVenta], 'method' => 'DELETE'])!!}
                        {!! Form::submit('Eliminar',['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}            
                                </td>
			                </tr>
			                @endforeach
                		</tbody>
                	</table>
                </div>
                {{ $ventas->render() }} 
 			 </div>
        </div>
    </div>

@endsection()