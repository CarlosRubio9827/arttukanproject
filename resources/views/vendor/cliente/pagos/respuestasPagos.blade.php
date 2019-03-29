@extends("vendor.adminlte.layouts.app")

 
@section('css-view')

<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

@endsection()

@section('htmlheader_title')
   Respuesta Pago
@endsection

@section('contentheader_title')

@endsection

@section("main-content")
<div class="text-center">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-success box-solid">
               <div class="box-header with-border">
                  <h3 class="box-title">Correcto</h3>
               </div>
               <div class="box-body">
               La compra se realizó correctamente
               </div>
            </div>
         </div>
     

         <div class="col-md-6">
            <div class="box box-success">
               <div class="box-header with-border">
                   <img width="130" src="{{asset('img/iconos/icons8-historial-de-pedidos-100.png')}}" alt="">
               </div>
               <div class="box-body no-padding">
                  <a href="{{ route('pedidos.index')}}">       
                  <td>
                  <div class="card">
                     <div class="card-body">
                        <button type="button" class="btn btn-block btn-success btn-lg">Ver mis pedidos <i class="fa fa-clipboard-check"></i>
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
                  <img width="130" src="{{asset('img/iconos/icons8-caja-128.png')}}">
                  </div>
                  <div class="box-body no-padding">
                     <a href="{{ route('catalogo')}}">       
                     <td>
                     <div class="card">
                        <div class="card-body">
                           <button type="button" class="btn btn-block btn-success btn-lg">Ver más productos <i class="fa fa-clipboard-check"></i>
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
 
 
 
@section('js-view')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>


  

@endsection()
@endsection