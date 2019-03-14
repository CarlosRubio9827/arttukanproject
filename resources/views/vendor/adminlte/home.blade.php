@extends('vendor.adminlte.layouts.app')


@section('css-view') 

@endsection()


@section('htmlheader_title')
    Inicio
@endsection

@section('contentheader_title')
	Bienvenido
@endsection 


@section('main-content')

<div class="section">

            <div class="row">

                <div class="col-md-6">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ingresos</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                                <a href="{{ route('ingresos.index')}}">       
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-block btn-danger btn-lg">Mostrar Ingresos <i class="fa fa-clipboard-check"></i>
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
                            <h3 class="box-title">Ventas</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <a href="{{ route('ventas.index')}}">       
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-block btn-success btn-lg">Mostrar Ventas <i class="fa fa-clipboard-check"></i>
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
                                    <h3 class="box-title">Productos</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body no-padding">
                                        <a href="{{ route('productos.index')}}">       
                                        <td>
                                            <div class="card">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-block btn-warning btn-lg">Mostrar productos <i class="fa fa-clipboard-check"></i>
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
                                    <h3 class="box-title">Tipos de Productos</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body no-padding">
                                    <a href="{{ route('tipoProductos.index')}}">       
                                        <td>
                                            <div class="card">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-block btn-primary btn-lg">Mostrar Tipos de Productos <i class="fa fa-clipboard-check"></i>
                                                    </button>
                                                </div>
                                            </div>     
                                        </td>
                                    </a>
                                </div>
                            </div>
                        </div>


            </div>

             

</div>



@endsection
   
