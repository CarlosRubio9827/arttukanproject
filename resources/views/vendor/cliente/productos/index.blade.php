 @extends("vendor.adminlte.layouts.app")

 

@section('css-view') 


@endsection()

@section('htmlheader_title')
    Catalogo de Productos
@endsection
 
@section('contentheader_title')
 
 
    <div class="text-center">
        <a href="{{route('mostrar-carrito')}}" class="btn btn-primary"> <img width="35px" src="{{asset('img/iconos/icons8-carrito-de-compras-50.png')}}" alt=""> Ver mi carrito </a>
    </div>
        
@endsection

 @section("main-content") 

<div class="container text-center">
    <div class="row" id="productos">
        @foreach ($productos as $producto)
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div style="min-height: 414px" class="producto white-panel">
                <h3>{{$producto->nombreProducto}}</h3><hr>
                <img  src="{{asset('images/'.$producto->imagen)}}" alt="Imagen del Producto" width="130px" height="170px">
                <div class="producto-info panel">
                    <p>{{$producto->descripcion}}</p>
                    <p><span class="label label-success">Precio: ${{ number_format($producto->precio)}}</span></p>
                    <p>
                        <a class="btn btn-warning" href="{{route('agregar-producto',$producto->idProducto)}}"><i class="fa fa-shopping-cart"></i> La quiero</a>
                        <a class="btn btn-primary" href="{{route('productos.show', $producto->idProducto)}}"><i class="fa fa-chevron-circle-right"> Ver mas</i></a>
                    </p>
                </div>  
            </div>
        </div>
        @endforeach
    </div>
</div>
    

@endsection()

@section('js-view')

 <script type="text/javascript" src="{{  asset('js/datatables.js')  }}"></script>
 <script type="text/javascript" src="{{  asset('js/dataTables.bootstrap.js')  }}"></script>
 
 <script>
  
$(document).ready( function () {

    $('#productos').pinterest_grid({
     no_columns: 4,
     padding_x: 10,
     padding_y: 10,
     margin_bottom: 50,
     single_column_breakpoint: 700
     });
     });

} );
</script>
@endsection()