<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
 
@section('htmlheader')
    @include('vendor.adminlte.layouts.partials.htmlheader')
@show

<!-- 
BODY TAG OPTIONS:
================= 
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-black sidebar-mini">

<div id="app">
    
    <div class="wrapper">

    @include('vendor.adminlte.layouts.partials.mainheader')

    @include('vendor.adminlte.layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('vendor.adminlte.layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
            
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('vendor.adminlte.layouts.partials.controlsidebar')

    @include('vendor.adminlte.layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')


    @include('vendor.adminlte.layouts.partials.scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
@show


</body>
</html>
