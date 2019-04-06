@extends("vendor.adminlte.layouts.app")

@section('htmlheader_title')
     Producto
@endsection

@section('contentheader_title')
    <div class="text-center">
        <h1> <i class="fa fa-shopping-cart"></i> <b>Detalle del Producto</b></h1>
    </div>

@endsection

@section("main-content")


<hr>

<div class="row text-center">

    <div class="col-md-6">
        <div class="producto-block">
            <img src="{{asset('images/'.$producto->imagen)}}" alt="Imagen del producto" >
        </div>
    </div>

    <div class="col-md-6">
        <div class="producto-block">
            <h3>{{$producto->nombreProducto}}</h3>
            <div class="prodcuto-info panel">
                <p>{{$producto->descripcion}}</p>
                <h3><span class="label label-success">Precio: $ {{number_format($producto->precio)}}
                    </span>
                </h3>
                <p>
                    <hr>
                    <a href="{{route('agregar-producto',$producto->idProducto)}}" class="btn btn-warning btn-block"><i class="fa fa-shopping-cart"> La quiero</i></a>
                </p>
            </div>
        </div>         
    </div>
    <hr>
    <br>
    <div class="col-md-12">
        <p><a class="btn btn-primary" href="{{route('catalogo')}}">
        <i class="fa fa-chevron-circle-left"> Volver</i></a></p>
    </div>
        
</div>



    

    @section('scripts')
    <script>
        $(document).ready(function() {
        $('#demo').pinterest_grid({
        no_columns: 4,
        padding_x: 10,
        padding_y: 10,
        margin_bottom: 50,
        single_column_breakpoint: 700
        });
        });
        </script>
        
    @endsection
@endsection