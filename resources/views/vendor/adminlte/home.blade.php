@extends('vendor.adminlte.layouts.app')


@section('css-view') 

@endsection()


@section('htmlheader_title')
    Inicio
@endsection

@section('contentheader_title')
<div class="text-center">
        <p>Bienvenido al panel de administracion</p>
</div>
	
@endsection 


@section('main-content')

<div class="section">

<div class="text-center">

        <div class="row">
                @if (Entrust::hasRole('admin'))
                    <div class="col-md-6">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                            <img width="90px" src="{{asset('img/iconos/icons8-carpeta-de-registros-200.png')}}" alt="">
                            </div>
                            <div class="box-body no-padding">
                                    <a href="{{ route('ingresos.index')}}">       
                                    <td>
                                        <div class="card">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-block btn-danger btn-lg">Ingresos <i class="fa fa-clipboard-check"></i>
                                                </button>
                                            </div>
                                        </div>     
                                    </td>
                                    </a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-header with-border">
                            <img width="90px" src="{{asset('img/iconos/icons8-superventas-100.png')}}" alt="">
                            </div>
                            <div class="box-body no-padding">
                                <a href="{{ route('ventas.index')}}">       
                                    <td>
                                        <div class="card">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-block btn-success btn-lg">Ventas <i class="fa fa-clipboard-check"></i>
                                                </button>
                                            </div>
                                        </div>     
                                    </td>
                                </a>
                            </div>
                        </div>
                    </div>
                
                </div> 
    
                <div class="row">
    
                        <div class="col-md-6">
                                <div class="box box-warning">
                                    <div class="box-header with-border">
                                        <img width="90px" src="{{ asset('img/iconos/icons8-caja-128.png') }}" alt="">
                                    </div>
                                    <div class="box-body no-padding">
                                            <a href="{{ route('productos.index')}}">       
                                            <td>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <button type="button" class="btn btn-block btn-warning btn-lg">Productos <i class="fa fa-clipboard-check"></i>
                                                        </button>
                                                    </div>
                                                </div>     
                                            </td>
                                            </a>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <img width="90px" src="{{ asset('img/iconos/icons8-categorizar-52.png') }}" alt="">
                                    </div>
                                    <div class="box-body no-padding">
                                        <a href="{{ route('tipoProductos.index')}}">       
                                            <td>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <button type="button" class="btn btn-block btn-primary btn-lg">Categorías de Productos <i class="fa fa-clipboard-check"></i>
                                                        </button>
                                                    </div>
                                                </div>     
                                            </td>
                                        </a>
                                    </div>
                                </div>
                            </div>
    
    
                </div>
               
                <div class="row">
                        <div class="col-md-6">
                                <div class="box  box-dafault">
                                    <div class="box-header with-border">
                                        <img width="90px" src="{{ asset('img/iconos/icons8-gestión-de-clientes-100.png') }}" alt="">
                                    </div>
                                    <div class="box-body no-padding">
                                        <a href="{{ route('clientes.index')}}">       
                                            <td>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <button type="button" class="btn btn-block btn-primary btn-lg">Clientes <i class="fa fa-clipboard-check"></i>
                                                        </button>
                                                    </div>
                                                </div>     
                                            </td>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box  box-default">
                                    <div class="box-header with-border">
                                        <img width="90px" src="{{ asset('img/iconos/icons8-servicios-80.png') }}" alt="">
                                    </div>
                                    <div class="box-body no-padding">
                                        <a href="{{ route('servicios.index')}}">       
                                            <td>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <button type="button" class="btn btn-block btn-primary btn-lg">Servicios <i class="fa fa-clipboard-check"></i>
                                                        </button>
                                                    </div>
                                                </div>     
                                            </td>
                                        </a>
                                    </div>
                                </div>
                            </div>
                </div>
                
            @else

            <div class="row">
                    <div class="col-md-6">
                            <div class="box  box-dafault">
                                <div class="box-header with-border">
                                    <img width="90px" src="{{ asset('img/iconos/icons8-caja-128.png') }}" alt="">
                                </div>
                                <div class="box-body no-padding">
                                    <a href="{{ route('catalogo')}}">       
                                        <td>
                                            <div class="card">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-block btn-primary btn-lg">Catálogo <i class="fa fa-clipboard-check"></i>
                                                    </button>
                                                </div>
                                            </div>     
                                        </td>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <img width="90px" src="{{ asset('img/iconos/icons8-historial-de-pedidos-100.png') }}" alt="">
                                    </div>
                                    <div class="box-body no-padding">
                                        <a href="{{ route('pedidos.index')}}">       
                                            <td>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <button type="button" class="btn btn-block btn-primary btn-lg">Mis pedidos <i class="fa fa-clipboard-check"></i>
                                                        </button>
                                                    </div>
                                                </div>     
                                            </td>
                                        </a>
                                    </div>
                                </div>
                            </div>
            </div>
                
            @endif
</div>     

</div>



@endsection
   
