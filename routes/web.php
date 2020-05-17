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
Route::get('/Lista_producto', 'ProductosController@index');
Route::get('/Crear_Almacen', 'AlmacenesController@create');
Route::get('/Lista_Almacen', 'AlmacenesController@index');
Route::get('/Almacenpdf','AlmacenesController@pdfgenerator');
Route::get('/Crear_Tienda', 'TiendaController@create');
Route::get('/Lista_Tienda', 'TiendaController@index');
Route::get('/Crear_Aeropuerto', 'AeropuertosController@create');
Route::get('/Lista_Aeropuerto', 'AeropuertosController@index');
Route::get('/pdf','ListasuariosController@pdfgenerator');
Route::get('/Asignar/{almacen}' ,'asignarAlmacenesController@create')->name('Asignarcreate');
Route::get('/Almacenamiento/{almacen}' ,'AlmacenamientoController@create')->name('Almacenamientocreate');
Route::get('/Capacidad','ProductosController@capacidad');
Route::get('/CapacidadAlmacen','AlmacenesController@capacidad');
Route::get('/FrecuencyQuestions','FaqController@index');




//routes resource
Route::resource('/Lista_Usuarios', 'ListasuariosController');
Route::resource('/Productos', 'ProductosController');
Route::resource('/Almacenes', 'AlmacenesController');
Route::resource('/Asignar', 'asignarAlmacenesController');
Route::resource('/Almacenamiento', 'AlmacenamientoController');
Route::resource('/Tiendas', 'TiendaController');
Route::resource('/Aeropuertos', 'AeropuertosController');
Route::resource('/FAQ', 'FaqController');

