<?php

use App\Actividad;
use App\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('login', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('send', ['as' => 'send', 'uses' => 'MailController@send'] );
Route::get('contact', ['as' => 'contact', 'uses' => 'MailController@index'] );


Route::get('cliente/index','ClienteController@index')->name('cliente');
Route::post('/cliente/{id}', 'ClienteController@update')->name('cliente.update'); //Formulario Actualizar
Route::resource('cliente', 'ClienteController');

Route::post('/actividad/{id}', 'ActividadController@update')->name('actividad.update'); //Formulario Actualizar
Route::resource('actividad', 'ActividadController');

Route::post('/prenda/{id}', 'PrendaController@update')->name('prenda.update'); //Formulario Actualizar
Route::resource('prenda', 'PrendaController');

Route::post('/talle/{id}', 'TalleController@update')->name('talle.update'); //Formulario Actualizar
Route::resource('talle', 'TalleController');

Route::post('/linea/{id}', 'LineaController@update')->name('linea.update'); //Formulario Actualizar
Route::resource('linea', 'LineaController');

Route::post('/producto/{id}', 'ProductoController@update')->name('producto.update'); //Formulario Actualizar
Route::resource('producto', 'ProductoController');

Route::post('/presupuesto/{id}', 'PresupuestoController@update')->name('presupuesto.update'); //Formulario Actualizar

Route::get('pdf','ReportController@generar')->name('report.generar');
Route::resource('reporte', 'ReportController'); // PDF 

Route::post('presupuesto/create/addItem','PostController@addItem')->name('presupuesto.create.addItem');	
Route::get ('presupuesto/create', 'PostController@readItems' );

Route::get('presupuesto/create', 'AutoCompleteController@index');
Route::post('presupuesto/create/fetch', 'AutoCompleteController@fetch')->name('presupuesto.create.fetch');
Route::post('presupuesto/create/fetchProducto', 'AutoCompleteController@fetchProducto')->name('presupuesto.create.fetchProducto');

Route::resource('presupuesto', 'PresupuestoController');

Route::resource('panel', 'PanelController');

// Selects en Cascada https://www.youtube.com/watch?v=FY6Pmrmz0Ws

Route::get('/ajax-subcat',function(){
$nombre_actividad = Input::get('nombre_actividad');
$nombre_producto = Producto::where('nombre_actividad','=',$nombre_actividad)->get();
return Response::json($nombre_producto);
});


Route::get('/', 'IndexController@readItems');
Route::post('addItem', 'IndexController@addItem');
Route::post('editItem', 'IndexController@editItem');
Route::post('deleteItem', 'IndexController@deleteItem');










