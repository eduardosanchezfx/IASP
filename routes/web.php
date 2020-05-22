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
Auth::routes();

//routes get
Route::get('/', function () {return view('auth.login');})->middleware('guest');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Perfil', 'listasuariosController@show');
Route::get('/Crear_Usuario', 'listasuariosController@create')->middleware('SuperMiddleware');
Route::get('/Crear_Producto', 'ProductosController@create')->middleware('SuperMiddleware');
Route::get('/Lista_producto', 'ProductosController@index')->name('/Lista_Producto');
Route::get('/Crear_Almacen', 'AlmacenesController@create')->name('/Crear_Almacen');
Route::get('/Lista_Almacen', 'AlmacenesController@index')->name('/Lista_Almacen');
Route::get('/Almacenpdf','AlmacenesController@pdfgenerator');
Route::get('/Crear_Tienda', 'TiendaController@create')->name('/Crear_Tienda');
Route::get('/Lista_Tienda', 'TiendaController@index')->name('/Lista_Tienda');
Route::get('/Crear_Aeropuerto', 'AeropuertosController@create')->name('/Crear_Aeropuerto');
Route::get('/Lista_Aeropuerto', 'AeropuertosController@index')->name('/Lista_Aeropuerto');
Route::get('/pdf','ListasuariosController@pdfgenerator');
Route::get('/Asignar/{almacen}' ,'asignarAlmacenesController@create')->name('Asignarcreate');
Route::get('/Almacenamiento/{almacen}' ,'AlmacenamientoController@create')->name('Almacenamientocreate');
Route::get('/Capacidad','ProductosController@capacidad')->name('/Capacidad');
Route::get('/CapacidadAlmacen','AlmacenesController@capacidad')->name('/CapacidadAlmacen');
Route::get('/FrecuencyQuestions','FaqController@index');
Route::get('/Crear_Envio/{almacen}', 'EnviosController@create')->name('Enviarcreate');
Route::get('/Lista_Envios/{almacen}', 'EnviosController@index')->name('Lista_Envios');
Route::get('/resultado', 'EnviosController@resultado');
Route::get('/Envios', 'EnviosController@listaenvios');




//routes resource
Route::resource('/Lista_Usuarios', 'ListasuariosController');
Route::resource('/Productos', 'ProductosController');
Route::resource('/Almacenes', 'AlmacenesController');
Route::resource('/Asignar', 'asignarAlmacenesController');
Route::resource('/Almacenamiento', 'AlmacenamientoController');
Route::resource('/Tiendas', 'TiendaController');
Route::resource('/Aeropuertos', 'AeropuertosController');
Route::resource('/FAQ', 'FaqController');
Route::resource('/Envio', 'EnviosController');

