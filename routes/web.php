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

//Ruta Sugerencias
Route::get('sugerencias', "SugerenciaController@store")->name('sugerencias');
Route::get('sugerencias/index',"SugerenciaController@index")->name('sugerencias/index');
Route::get('sugerencias/mostrar/{servicio}','SugerenciaController@mostrar')->name('sugerencias/mostrar');

Route::resource('tipoProductos',"TipoProductoController");
Route::resource("productos","ProductoController");
Route::resource("ventas","VentaController");
Route::resource("ingresos","IngresoController");
Route::resource("servicios","ServicioController");
Route::resource('clientes','ClienteController');
//Rutas Pedidos-----------------//
Route::resource("pedidos","PedidoController");

Route:: get('pedidos/atender/{servicio}',[
    'as'=>'pedidos/atender',
    'uses'=>'PedidoController@atender'
    ]); 


Route:: get('usuarioServicio/store/{servicio}',[
    'as'=>'usuarioServicio/store',
    'uses'=>'UsuarioServicioController@store'
    ]); 

 

//Ruta Servicio Usuario
Route:: get('usuarioServicio/store/{servicio}',[
    'as'=>'usuarioServicio/store',
    'uses'=>'UsuarioServicioController@store'
    ]); 

Route::get('usuarioServicio/index',[
    'as'=>'usuarioServicio/index',
    'uses'=>'UsuarioServicioController@index'
]);

Route::get('usuarioServicio/mostrar/{servicio}',[
    'as'=>'usuarioServicio/mostrar',
    'uses'=>'UsuarioServicioController@mostrar'
]); 

Route::get('usuarioServicio/atender/{servicio}',[
    'as'=>'usuarioServicio/atender',
    'uses'=>'UsuarioServicioController@atender'
]);

Route::get('usuarioServicio/cancelar/{servicio}',[
    'as'=>'usuarioServicio/cancelar',
    'uses'=>'UsuarioServicioController@cancelar'
]);

Route::get('ingresosPdf','IngresoController@exportarPdf')->name('ingresosPdf');

Route::get('ventasPdf','VentaController@exportarPdf')->name('ventasPdf');

Route::get('tiposProductos','TipoProductoController@exportarPdf')->name('tiposProductosPdf');

Route::get('productosPdf', 'ProductoController@exportarPdf')->name('productosPdf');

Route::get('serviciosPdf', 'ServicioController@exportarPdf')->name('serviciosPdf');

Route::get('clientesPdf','ClienteController@exportarPdf')->name('clientesPdf');

Route::get('pedidosPdf','PedidoController@exportarPdf')->name('pedidosPdf');

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



