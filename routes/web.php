<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'PageController@index')->name('index');
Route::get('/nosotros', 'PageController@nosotros')->name('nosotros');
Route::get('/portafolio', 'PageController@galeria')->name('portafolio');
Route::get('/portafolio/{id}', 'PageController@galeria_view')->name('portafolio_imagenes');
Route::get('/blog', 'PageController@blog')->name('blog');
Route::get('/post/{id}', 'PageController@post')->name('post');
Route::get('/contacto', 'PageController@contacto')->name('contacto');
Route::get('/servicios', 'PageController@servicios')->name('servicios_turismo');
Route::get('/paquetes-turisticos', 'PageController@paquetes')->name('paquetes_turisticos');
Route::get('/paquetes-turisticos/categoria/{id}','PageController@paquetes_all')->name('paquetes_turisticos_todos');
Route::get('/paquete-turistico/informacion/{id}', 'PageController@paquete_detalle')->name('paquete_detalle');

Auth::routes(['register'=>false]); // Aqui poder inahbilitar 
Route::get('/home', 'HomeController@index')->name('home');



/*
    * Administración Intranet
*/

Route::resource('/caja','backend\CajaController')->middleware('auth');
Route::delete('/caja/{caja}/cerrar_caja/{monto_cierre}','backend\CajaController@cerrarCaja')->middleware('auth')->name('caja.cerrarCaja');


Route::resource('/producto','backend\ProductoController')->middleware('auth');
Route::get('/productoPrice/{id}','backend\ProductoController@productoPrice')->middleware('auth')->name('productoPrice');


Route::resource('/reserva','backend\ReservaController')->middleware('auth');
Route::get('/reserva/buscar_reserva/{id}','backend\ReservaController@buscarReserva')->middleware('auth')->name('reserva.buscar_reserva');
Route::post('/reserva/pago_reserva/','backend\ReservaController@pagoReserva')->middleware('auth')->name('reserva.pago_reserva');
Route::get('/reserva/invoice/{reserva}','backend\ReservaController@invoice')->middleware('auth')->name('reserva.invoice');


Route::resource('/ingreso','backend\IngresoController')->middleware('auth');
Route::resource('/egreso','backend\EgresoController')->middleware('auth');

Route::resource('/cliente','backend\ClienteController')->middleware('auth');
Route::post('/cliente/nuevo_cliente/','backend\ClienteController@nuevoClienteModal')->middleware('auth')->name('nuevoClienteModal');


Route::resource('/metodos_pago','backend\MetodoPagoController')->middleware('auth')->parameters(['metodos_pago'=> 'metodo' ]);
Route::resource('/venta','backend\VentaController')->middleware('auth')->parameters(['venta' => 'venta']);

Route::resource('/tour','backend\TourController')->middleware('auth')->except('show');
Route::get('/selectorTour/{id}','backend\TourController@selectorTour')->middleware('auth')->name('selectorTour');


/**
 * Reportes 
*/

Route::get('/reportes','backend\ReporteController@index')->middleware('auth')->name('reporte.index');
Route::post('/reporte/ventas','backend\ReporteController@ventasAll')->middleware('auth')->name('reporte.ventas');
Route::post('/reporte/reservas','backend\ReporteController@reservasAll')->middleware('auth')->name('reporte.reservas');
Route::post('/reporte/caja/ingresos','backend\ReporteController@ingresosAll')->middleware('auth')->name('reporte.ingresos');
Route::post('/reporte/caja/egresos','backend\ReporteController@egresosAll')->middleware('auth')->name('reporte.egresos');


/*
    * Administracion Pagina
 */
Route::resource('/categoriasPage', 'CategoriaPageController')->middleware('auth')->parameters(['categoriasPage' => 'categoriaPage']);
Route::resource('/toursPage','TourPageController')->middleware('auth')->parameters(['toursPage' => 'tourPage']);
Route::resource('/serviciosPage','ServicioPageController')->middleware('auth')->parameters(['serviciosPage' => 'servicioPage']);
Route::resource('/galeriaPage','GaleriaPageController')->middleware('auth');
Route::delete('/galeriaPage/{galeriaPage}/delete/{key}','GaleriaPageController@delete_imagen')->middleware('auth')->name('galeriaPage.deleteImagen');
Route::resource('/posts','PostController')->middleware('auth');
 

/**
 * configuracion user
 */

Route::resource('/usuarios', 'UserController')->middleware('auth');