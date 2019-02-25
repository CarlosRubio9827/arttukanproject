@extends('vendor.adminlte.layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
    <div id="app">
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

            <div class="register-box-body">
                <p class="login-box-msg">Registrar Nuevo Usuario</p>

                <form action="{{ url('/register') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-group has-feedback">
                        <label>Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombres" name="nombres" value="{{ old('name') }}"/>
                    </div>
                    
                    <div class="form-group has-feedback">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}"/>
                    </div>

                    <div class="form-group has-feedback">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    </div>

                    <div class="form-group has-feedback">
                        <label>Tipo Documento</label>
                        <select name="tipoDocumento" id="tipoDocumento" class="form-control selectpicker" data-live-search='true'>
                            <option value="CÉDULA DE CIUDADANÍA">CÉDULA DE CIUDADANÍA</option>
                            <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                            <option value="PASAPORTE">PASAPORTE</option>
                        </select>
                    </div> 

                    <div class="form-group has-feedback">
                        <label>Número de Documento</label>
                        <input type="number" class="form-control" placeholder="Número Documento" name="numDocumento" value="{{ old('numDocumento') }}"/>
                    </div>

                    <div class="form-group has-feedback">
                        <label>Dirección</label>
                        <input type="text" class="form-control" placeholder="Dirección" name="direccion" value="{{ old('direccion') }}"/>
                    </div>

                    <div class="form-group has-feedback">
                        <label>Telefono</label>
                        <input type="number" class="form-control" name="telefono" placeholder="Telefono" name="telefono" value="{{ old('telefono') }}">
                    </div>

                    <div class="form-group has-feedback">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                    </div>

                    <div class="form-group has-feedback">
                        <label>Confirme Contraseña</label>
                        <input type="password" class="form-control" placeholder="Confirme password" name="password_confirmation"/>
                    </div>

                    <div class="row">
                        <div class="col-xs-1">
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
                                <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Acepto los terminos y condiciones</button>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-10" >
                            <button type="submit" class="btn btn-primary btn-block btn-flat"> Registrarse </button>
                        </div><!-- /.col -->
                    </div>

                </form>

                @include('vendor.adminlte.auth.partials.social_login')

                <a href="{{ url('/login') }}" class="text-center">¿Ya tienes una cuenta?</a>
            </div><!-- /.form-box -->
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

</body>

@endsection
