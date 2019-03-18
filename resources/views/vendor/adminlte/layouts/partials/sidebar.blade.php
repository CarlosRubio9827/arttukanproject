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
            <li class=""><a href="{{ url('home') }}"><i class="fa fa-home" aria-hidden="true"></i>
 <span>{{ trans('Inicio') }}</span></a></li>
            <li class=""><a href="{{ url('pedidos') }}"><i class='fa fa-link'></i> <span>{{ trans('Pedidos') }}</span></a></li>
            <li class=""><a href="{{ url('ingresos') }}"><i class='fa fa-link'></i> <span>{{ trans('Ingresos') }}</span></a></li>
            <li class=""><a href="{{ route('ventas.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Ventas') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('Productos') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('productos.index') }}"><i class='fa fa-link'></i> <span>{{ trans('Productos') }}</span></a></li>
                    <li><a href="{{ route('tipoProductos.index')}}"><i class='fa fa-link'></i> <span>{{ trans('Tipos de Productos') }}</span></a></li>
                </ul>
            </li>
        <li class=""><a href="{{route('clientes.index')}}"><i class='fa fa-link'></i> <span>{{ trans('Clientes') }}</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
