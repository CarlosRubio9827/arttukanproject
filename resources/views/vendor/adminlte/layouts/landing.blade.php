<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>ArtTukan - Bienvenido</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">
    
 
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>Art</b>Tukan</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#home" class="smoothScroll">Inicio</a></li>
                    <li><a href="#desc" class="smoothScroll">Productos y Servicios</a></li>
                    <li><a href="#quienesSomos" class="smoothScroll">¿Quiénes Somos?</a></li>
                    <li><a href="#contact" class="smoothScroll">Contacto</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><b>Iniciar Sesión</b></a></li>
                        <li><a href="{{ url('/register') }}"><b>Registrarse</b></a></li>
                    @else
                        <li><a href="/../home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div> 

<!-----------------------------Inicio de Home------------------------>

    <section id="home" name="home"></section>
    <div class="row">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active" >

          <img class="center-block" src="{{asset('img/thor.jpg') }}" alt="..."  width="560"/>
            <div class="carousel-caption">
              ...
            </div>
          </div>
          <div class="item">
            <img class="center-block" src="{{asset('img/ironman.jpg')}}" alt="..." width="560"/>
            <div class="carousel-caption">
              ...
            </div>
          </div>
          <div class="item"> 
            <img class="center-block" src="{{asset('img/venom.jpg')}}" alt="..." width="560"/>
            <div class="carousel-caption">
              ...
            </div>
          </div>
          ...
        </div>
      
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
      </div>
      
    </div>


<!-----------------------Final de home----------------------------------->

<!---Inicio de Sección de productos-->

    <section id="desc" name="desc"></section>
    <!-- INTRO WRAP -->
    <div id="intro">
        <div class="container">
            <div class="col-xs-4 col-md-4 col-lg-4">
                
                <h4>Price Card</h4>
                <div class="card card-price">
                  <div class="card-img">
                    <a href="#">
                      <img src="http://placeimg.com/640/320/nature/grayscale" class="img-responsive">
                      <div class="card-caption">
                        <span class="h2">Big Item</span>
                        <p>100% silk</p>
                      </div>
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="price">$20 <small>each</small></div>
                    <div class="lead">Wrap yourself in luxury</div>
                    <ul class="details">
                      <li>A stitch in time saves nine.</li>
                      <li>All good things come to those who wait.</li>
                      <li><b>Shipping:</b> $10 in USA, $15 outside USA</li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-lg btn-block buy-now">
                      Buy now <span class="glyphicon glyphicon-triangle-right"></span>
                    </a>
                  </div>
                </div>
            </div>

        </div>
            <br>
            <hr>
    </div> <!--/ .container -->


    <!---Fin de Sección de productos-->

<!----------------Quienes Somos---------------->

    <section id="quienesSomos" name="quienesSomos"></section>
    <div id="showcase">
        <div class="container">
            <div class="row">
                 <div class="col-md-12">
                        <b><h1>Politica de Calidad</h1></b>
                        <h4>
                            <b>
                                    En ART TUKAN ofrecemos a nuestros clientes bolsos, prendas de vestir y suvenirs con diseños exclusivos étnicos contemporáneos y arte en general, diferentes a los diseños étnicos tradicionales, con texturas, materiales naturales y telas a utilizar en cada diseño que permitan llevar nuestra cultura a otro nivel, donde un bolso o prenda de vestir de ART TUKAN se pueda utilizar en cualquier situación del día demostrando nuestra cultura, raíces colombianas y del mundo. Uniendo la artesanía con la confesión industrial, con materiales y procesos que ayuden al medio ambiente. Gracias a la gran variedad de estampados y diseños, ART TUKAN ofrece productos para un amplio espectro de edades, estilos y personalidades.
                            </b>
                        </h4>          
                </div>
                <div class="col-md-12">
                    <b><h1>Misión</h1></b>
                    <h3>
                        <b>
                                En ART TUKAN trabajamos para ayudar a nuestros clientes a ser originales y auténticos con sus prendas de vestir de estilos exclusivos, étnicos contemporáneos y arte en general, nuestra misión es brindar apoyo a nuestros clientes en el proceso de selección de su diseño.
                        </b> 
                    </h3>
                </div>
                <div class="col-md-12">
                        <b><h1>Visión</h1></b>
                        <h3>
                            <b>
                                    Ofrecer un concepto innovador que combine los estilos étnicos, el arte en general y tu toque de estilo propio, que te harán vestir con un estilo único.
                            </b>
                        </h3>
                    </div>
            </div>
           
        </div><!-- /container -->
    </div>

    <!--------------Contacto------------------->

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
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })



</script>
</body>
</html>
