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
Route::resource("servicios","ServicioController");


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

// - Inicio Rutas Carritos ---------------------------------------------- //

Route::bind('producto', function($idProducto){
  return App\Producto::where('idProducto', $idProducto)->first();
});

//ruta mostrar carrito
Route:: get('carrito/show',[
    'as'=>'mostrar-carrito',
    'uses'=>'CarritoController@show'
    ]);

//ruta agregar producto carrito
Route:: get('carrito/add/{producto}',[
'as'=>'agregar-producto',
'uses'=>'CarritoController@add'
]);

//ruta eliminar producto carrito
Route:: get('carrito/delete/{producto}',[
'as'=>'eliminar-producto',
'uses'=>'CarritoController@delete'
]);


//ruta vaciar producto carrito
Route:: get('carrito/trash',[
'as'=>'vaciar-carrito',
'uses'=>'CarritoController@trash'
]);


//ruta actualizar producto carrito
Route:: get('carrito/update/{producto}/{cantidad?}',[
'as'=>'actualizar-producto',
'uses'=>'CarritoController@update'
]);


//ruta detalle producto
Route:: get('producto/{id}',[
'as'=>'detalle-producto',
'uses'=>'ProductoController@show'
]);

//ruta detalle pedido
Route:: get('detalle',[ 
'middleware' => 'auth',
'as'=>'detalle-pedido',
'uses'=>'CarritoController@detalle'
]);

//ruta mostrar productos
Route:: get('catalogo',[
'as'=>'catalogo',
'uses'=>'ProductoController@index']);

//- Fin Rutas Carrito -------------------------------------------//

//Rutas Pagos-----------------------//
 
Route::get('pagos/respuestasPago',[
    'uses'=>'PagoController@respuestaPago'
]);

//Rutas Pedidos-----------------//

Route::resource("pedidos","PedidoController");

