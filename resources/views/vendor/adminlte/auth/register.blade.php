@extends('vendor.adminlte.layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

 <div id="fondoLogin">
                    <div class="register-box">
                        <div class="register-logo">
                            <a href="{{ url('/home') }}"><b>Art</b>Tukan</a>
                        </div>
            
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> {{ trans('adminlte_lang.message.someproblems') }}<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            
                        <div  class="register-box-body ">   
                            <p class="login-box-msg"><b>Registrar Nuevo Usuario</b></p>
             
                            <form action="{{ url('/register') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 ">
                                        <div class="form-group has-feedback">
                                            <label><b>Nombres</b></label>
                                            <input type="text" class="form-control" placeholder="Nombres" name="nombres" value="{{ old('name') }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 olc-xs-12 col-sm-12">
                                        <div class="form-group has-feedback">
                                            <label><b>Apellidos</b></label>
                                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6 olc-xs-12 col-sm-12">
                                            <div class="form-group has-feedback">
                                            <label><b>Email</b></label>
                                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 olc-xs-12 col-sm-12">
                                        <div class="form-group has-feedback">
                                            <label><b>Tipo Documento</b></label>
                                            <select name="tipoDocumento" id="tipoDocumento" class="form-control selectpicker" data-live-search='true'>
                                                <option value="CÉDULA DE CIUDADANÍA">CÉDULA DE CIUDADANÍA</option>
                                                <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                                                <option value="PASAPORTE">PASAPORTE</option>
                                            </select>
                                        </div> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6 olc-xs-12 col-sm-12">
                                        <div class="form-group has-feedback">
                                            <label><b>Número de Documento</b></label>
                                            <input type="number" class="input-number form-control" placeholder="Número Documento" name="numDocumento" value="{{ old('numDocumento') }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 olc-xs-12 col-sm-12">
                                        <div class="form-group has-feedback">
                                            <label><b>Dirección</b></label>
                                            <input type="text" class="form-control" placeholder="Dirección" name="direccion" value="{{ old('direccion') }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6 olc-xs-12 col-sm-12">
                                        <div class="form-group has-feedback">
                                            <label><b>Teléfono</b></label>
                                            <input type="number" class="input-number form-control" name="telefono" placeholder="Telefono" name="telefono" value="{{ old('telefono') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 olc-xs-12 col-sm-12">
                                        <div class="form-group has-feedback">
                                            <label><b>Contraseña</b></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6 olc-xs-12 col-sm-12">
                                            <div class="col-xs-1">
                                                <br>
                                                    <label>
                                                        <div class="checkbox_register icheck">
                                                            <label>
                                                                <input type="checkbox" name="terms">
                                                            </label>
                                                        </div>
                                                    </label>
                                                </div><!-- /.col -->
                                                <div class="col-xs-10">
                                                    <div class="form-group">
                                                       <br> <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Acepto los terminos y condiciones</button>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 olc-xs-12 col-sm-12">
                                        <div class="form-group has-feedback">
                                            <label><b>Confirme Contraseña</b></label>
                                            <input type="password" class="form-control" placeholder="Confirme password" name="password_confirmation"/>
                                        </div>
                                    </div>
                                </div>
                          
                                <div class="row">
                                    <!-- /.col --><div class="text-center">
                                    <div class="col-xs-12 col-md-12 col-sm-12" >
                                        
                                            <button type="submit" class="btn btn-primary btn-block btn-flat"> Registrarse </button>
                                        </div>
                                    </div><!-- /.col -->
                                </div>
                            </form>
                            <div class="text-center">
                                <a href="{{ url('/login') }}" class="text-center">¿Ya tienes una cuenta?</a>
                            </div>
                        </div><!-- /.form-box -->
                    </div><!-- /.register-box -->
               
            
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

 <section id="contact" name="contact"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>Direccion</h3>
                <p>
                        Cra. 15 No. 30-43 Barrio Colombina <br/>
                    Palmira - Valled del Cauca,<br/>
                        <br/>
                    Colombia
                </p>
            </div>

            <div class="col-lg-7">
                <h3>Escribenos</h3>
                <br>
                <form role="form" action="sugerencias" method="get" enctype="plain">
                    <div class="form-group">
                        <label for="name1">Nombres</label>
                        <input type="name" name="Name" class="form-control" id="nombres" placeholder="Tu mombre y apellido">
                    </div>
                    <div class="form-group">
                        <label for="email1">Correo Electronico</label>
                        <input type="email" name="Mail" class="form-control" id="email" placeholder="Correo Electronico">
                    </div>
                    <div class="form-group">
                        <label>Tu Texto</label>
                        <textarea placeholder="Sugerencia...." class="form-control" name="sugerencias" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-large btn-success">Enviar</button>
                    {{ csrf_field('patch') }}
                </form>
            </div>
        </div> 
    </div> 


    <div id="c">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                        <p>
                                Escriba la información de teléfono (s) y correo (s) electrónico (s),  a través de los cuales lo puedan contactar.
                               <br> Celular: 316-4939724
                                <br> Email: arttukancolombia@gmail.com
                                <br>
                                <strong>Horarios de Atencion</strong>
                                <br>Lunes a Viernes: 8:00 AM a 12:00 PM // 02:00 PM A  5:00 PM y Sábados: 8:00 AM a 12:00 PM
                                <div class="col-sm-12 item">
                                        Copyright &copy; 2018-2019 <b><a href="#" style="color: #fff">ArtTukan Colombia</a></b>.
                                        Todos los derechos reservados.
                                </div>
                            </p>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                               <strong> <p>Siguenos</p> </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <a href="https://www.instagram.com/arttukancolombia/?hl=es-lam">  
                                <i  class="fab fa-instagram"></i>
                            </a>

                            <a href="https://es-la.facebook.com/arttukancolombia/">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>


@endsection


<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

<script>

$(document).ready(function() {
alert('DSDSDSD');
	$('.input-number').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
        });
	   
        });
 
</script>
	
