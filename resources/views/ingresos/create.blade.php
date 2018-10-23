@extends("adminlte.layouts.app")


 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">

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

             {{--    <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                        <div class="form-group">
                            <label for="stock">Fecha</label>
                            <input type="date" name="fechaHora" required value="{{ old('stock') }}"class='form-control' placeholder="Stock">
                        </div>
                    </div>
                </div> --}}

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

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                        <div class="form-group">
                            <input  type="hidden" value="{{ csrf_token() }}" name="_token">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <a href="{{ route('productos.index') }}"><button  class="btn btn-danger" >Cancelar</button></a>
                        </div>
                    </div>

                </div>

                    {!! Form::close() !!}       
      


@section('scripts')

<script type="text/javascript" src="{{ asset('js/bootstrap-select.min') }}"></script>

@endsection()

@section('js-view')

<script type="text/javascript" src="{{ asset('js/bootstrap-select.min') }}"></script>
 
@endsection()

@endsection