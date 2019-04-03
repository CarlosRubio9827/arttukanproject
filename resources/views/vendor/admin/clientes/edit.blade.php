@extends("vendor.adminlte.layouts.app")
 
@section('contentheader_title')
      
@endsection

@section('css-view')

<link rel="stylesheet" type="text/css" href="{{  asset('css/datatables.css')  }}"/>
 <link rel="stylesheet" type="text/css" href="{{  asset('css/dataTables.bootstrap.css')  }}"/>

@endsection()

@section('htmlheader_title')
   Modificar Cliente
@endsection

@section('contentheader_title')

@endsection

@section("main-content")

<div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Default box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Modificar Cliente </h3>
                    </div>
                    <div class="box-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Cuidado! </strong>Revisa Bien los datos introducidos<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


            {!! Form::model($cliente,['method' => 'PATCH', 'route' => ['clientes.update',$cliente->id] ]) !!}
            {{Form::token()}}
            
                    <div class="row">
                        <div class="panel-body"> 
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                <input name="nombres" type="text" required value="{{$cliente->nombres}}" class="form-control"> 
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                <div class="form-group">
                                    <label for="apelldos">Apellidos</label>
                                    <input name="apellidos" type="text" required value="{{$cliente->apellidos}}"  id="papellidos" class="form-control" >
                                </div>
                            </div>  

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" required value="{{$cliente->email}}" class="form-control"  >
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                <div class="form-group">
                                    <label for="tipoDocumento">Tipo Documento</label>
                                    <select required value="{{$cliente->tipoDocumento}}" name="tipoDocumento" class="form-control select2 select2-hidden-accessible" >
                                        <option value="">Seleccione Una Opción</option>
                                        <option value="Cedula Ciudadania">Cedula Ciudadania</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                <div class="form-group">
                                    <label for="numDocumento">Número Documento</label>
                                    <input type="text" name="numDocumento" required value="{{$cliente->numDocumento}}" class="input-number form-control"   />
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" required value="{{$cliente->direccion}}" class="form-control" >
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                <div class="form-group">
                                    <label for="telefono">Telefóno</label>
                                    <input type="text" name="telefono" required value="{{$cliente->telefono}}" class="input-number form-control" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                <div class="form-group">
                                    <label for="password" >Contraseña</label>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" />
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar" align="center">
                            <div class="form-group">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                <button class="btn btn-primary" type="submit">Modificar</button>
                                
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
                            <div class="form-group">
                                    <input  type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <button class="btn btn-danger btn-md btn-block " type="button" onclick="history.back()">Cancelar</button>
                            </div>
                        </div>
                    </div>
                
            {!! Form::close() !!} 
                </div><!-- /.register-box -->
            </div>
        </div>
    </div>
</div> 

   
           
     
@endsection