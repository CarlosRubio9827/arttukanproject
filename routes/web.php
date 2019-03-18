<?php
use App\Ingreso;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
 
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/', function () {
    return view('vendor.adminlte.layouts.landing');
});
Route::get('/bienvenido', function(){
return view('vendor.adminlte.welcome');
});


Route::get('sugerencias', "SugerenciaController@store")->name('sugerencias');

Route::resource('tipoProductos',"TipoProductoController");
Route::resource("productos","ProductoController");
Route::resource("ventas","VentaController");
Route::resource("ingresos","IngresoController");
Route::resource("pedidos","PedidoController");
Route::resource('clientes','ClienteController');
 
Route::get('ingresosPdf', function(){
                        
            $ingresos = App\Ingreso::all(); 
            $pdf = PDF::loadView( "vendor.admin.ingresos.ingresos-pdf",['ingresos'=>$ingresos]);
            
            return $pdf->download('listadoIngresospdf');
})->name('ingresos.pdf');

Route::get('ventasPdf', function(){
                        
            $ventas = App\Venta::all(); 
            $pdf = PDF::loadView( "vendor.admin.ventas.ventas-pdf",['ventas'=>$ventas]);
            
            return $pdf->download('listadoVentas.pdf');
})->name('ventas.pdf');

Route::get('tiposProductosPdf', function(){
                        
    $tiposProductos = App\TipoProducto::all(); 
    $pdf = PDF::loadView( "vendor.admin.tipoProductos.tiposProductos-pdf",['tiposProductos'=>$tiposProductos]);
    
    return $pdf->download('listadoTiposProducto.pdf');
})->name('tiposProductos.pdf');

Route::get('productosPdf', function(){
                        
    $productos = App\Producto::all(); 
    $pdf = PDF::loadView( "vendor.admin.productos.productos-pdf",['productos'=>$productos]);
    
    return $pdf->download('listadoProductos.pdf');
})->name('productos.pdf');

Route::get('clientesPdf', function(){
                        
    $clientes = App\Cliente::all(); 
    $pdf = PDF::loadView( "vendor.admin.clientes.clientes-pdf",['clientes'=>$clientes]);
    
    return $pdf->download('listadoClientes.pdf');
})->name('clientes.pdf');


