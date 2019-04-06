@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in 
@endsection
@section('css-view')
 

@endsection()
@section('content')

    <div id="fondoLogin">
        <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title"><a href="{{url('/')}}">ArtTukan</a></h1>
                        <div class="account-wall">
                        <img class="profile-img" src="{{asset('img/img72.jpg')}}"
                                alt="">
            
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
            
                            <form class="form-signin" action="{{ url('/login') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                Ingresar</button>
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <label class="checkbox pull-left">
                                            <input type="checkbox" value="remember-me">
                                            Recuerdame
                                        </label>                    
                                    </div>
                                </div>
                            </form> 
                            <div class="row">
                                <div style="text-align: center" class="col-md-12 col-lg-12 col-sm-12">
                                    ¿Todavia no eres miembro?
                                </div>
                                <div  style="text-align: center"; class="col-md-12 col-lg-12 col-sm-12">
                                <a href="{{url('/register')}}" class="text-center new-account">Crear una cuenta </a>
                                <a href="{{url('password/reset')}}">Olvidé mi contraseña</a>
                                </div>    
                            </div>
                            
                        </div>
                    </div>
                </div>  
            </div>
            
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
                            <img src="{{asset('img/iconos/icons8-instagram-48.png')}}" alt="">
                            </a>

                            <a href="https://es-la.facebook.com/arttukancolombia/">
                                <img src="{{asset('img/iconos/icons8-facebook-48.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>


   @endsection

    @include('adminlte::layouts.partials.scripts_auth')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>




