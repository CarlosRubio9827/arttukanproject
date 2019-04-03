<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
               
                <div class="pull-left info">
                <p>{{ $user->nombres }} {{ $user->apellidos}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i>En línea</a>
                </div>
            </div>
        @endif
      
        <!-- /.search form -->
 
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menú</li>
            <!-- Optionally, you can add icons to the links -->
        <li class=""><a href="{{ url('home') }}"><img width="20px" src="{{asset('img/iconos/icons8-casa-26.png')}}" alt="">
            <span>{{ trans('Inicio') }}</span></a></li>
            @if (Entrust::hasRole('admin'))
        <li class="treeview">
            <a href="#"><img width="20px" src="{{asset('img/iconos/icons8-caja-50.png')}}" alt=""><span>{{ trans(' Productos') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
        <li><a href="{{ route('tipoProductos.index')}}"><img width="20px" src="{{asset('img/iconos/icons8-categorizar-52.png')}}"><span>{{ trans('Productos') }}</span></a></li>
        <li><a href="{{ route('productos.index') }}"> <img width="20px" src="{{asset('img/iconos/icons8-caja-128.png')}}"><span>{{ trans('Articulos') }}</span></a></li>
            </ul>
        </li>
        <li class=""><a href="{{ url('pedidos') }}"><img width="20px" src="{{asset('img/iconos/icons8-historial-de-pedidos-100.png')}}" alt=""> <span>{{ trans('Pedidos') }}</span></a></li>
        <li class=""><a href="{{ url('ingresos') }}"><img width="20px" src="{{asset('img/iconos/ejecucion.png')}}" alt=""> <span>{{ trans('Producción') }}</span></a></li>
        <li class=""><a href="{{ route('ventas.index') }}"><img width="20px" src="{{asset('img/iconos/icons8-superventas-100.png')}}"> <span>{{ trans('Ventas') }}</span></a></li>
            
        <li class="treeview">
            <a href="#"><img width="20px" src="{{asset('img/iconos/icons8-servicios-80.png')}}"><span>{{ trans('Servicios') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li class=""><a href="{{route('servicios.index')}}"><img width="20px" src="{{asset('img/iconos/icons8-servicios-80.png')}}"> <span>{{ trans('Servicios') }}</span></a></li>
                <li><a href="{{ route('usuarioServicio/index') }}"> <img width="20px" src="{{asset('img/iconos/servicio-en-la-habitacion.png')}}"><span>{{ trans('Servicios Solicitado') }}</span></a></li>
            </ul>
        </li>
            
        <li class=""><a href="{{route('clientes.index')}}"><img width="20px" src="{{asset('img/iconos/icons8-gestión-de-clientes-100.png')}}"> <span>{{ trans('Clientes') }}</span></a></li>
            @endif()
            @if (Entrust::hasRole('cliente'))
            
        <li><a href="{{route('catalogo')}}"><img width="20px" src="{{asset('img/iconos/icons8-caja-128.png')}}" alt=""> <span>{{ trans('Catálogo') }}</span></a></li>
        
        <li class="treeview">
            <a href="#"><img width="20px" src="{{asset('img/iconos/icons8-servicios-80.png')}}" alt=""> <span>{{ trans(' Servicios') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{route('servicios.index')}}"><img width="20px" src="{{asset('img/iconos/icons8-servicios-80.png')}}" alt=""> <span>{{ trans(' Solicitar Servicio') }}</span></a></li>
                <li><a href="{{route('usuarioServicio/index')}}"><img width="20px" src="{{asset('img/iconos/servicio-en-la-habitacion.png')}}" alt=""> <span>{{ trans(' Servicios Solicitados') }}</span></a></li>
            </ul>
        </li>

        <li><a href="{{route('pedidos.index')}}"><img width="20px" src="{{asset('img/iconos/icons8-historial-de-pedidos-100.png')}}" alt=""> <span>{{ trans('Mis Pedidos') }}</span></a></li>    
            
            @endif()
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
