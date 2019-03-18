 @extends("vendor.adminlte.layouts.app")

 
 @section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()
 
@section('htmlheader_title')
    Registrar Cliente
@endsection
 
@section('contentheader_title')
        
@endsection

@section("main-content")

  
 
<section class="content">
      
        <div class="container-fluid spark-screen">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- Default box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Clientes </h3>
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
    
    
                    {!! Form::open(['route' => 'clientes.store', 'method'=>'POST','autocomplete'=>'off']) !!}
                    {{Form::token()}}
                    
                    <div class="row">
                            <div class="panel-body"> 
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input name="nombres" type="text" placeholder="Nombres" class="form-control"> 
                                    </div>
                                </div>
        
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                    <div class="form-group">
                                        <label for="apelldos">Apellidos</label>
                                        <input name="apellidos" type="text"  id="papellidos" class="form-control" placeholder="Apellidos">
                                    </div>
                                </div>  
        
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="email"  class="form-control" placeholder="Email">
                                    </div>
                                </div>
        
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                    <div class="form-group">
                                        <label for="tipoDocumento">Tipo Documento</label>
                                        <select name="tipoDocumento" class="form-control select2 select2-hidden-accessible" >
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
                                        <input type="text" name="numDocumento" class="input-number form-control" placeholder="Número Documento" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" name="direccion" class="form-control" placeholder="Dirección">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                    <div class="form-group">
                                        <label for="telefono">Telefóno</label>
                                        <input type="text" name="telefono" class="input-number form-control" placeholder="Telefóno" />
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
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        
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
                   
    
        @include('vendor.adminlte.layouts.partials.scripts_auth')
    
        @include('vendor.adminlte.auth.terms')
    
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    
    </div> 
                </div>
        </div>   

</section><!-- /.content -->        

@section('js-view')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>

$(document).ready(function(){ 



$('.input-number').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});

});

</script>

   


@endsection()
@endsection()

