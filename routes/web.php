<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']], function(){
    Route::resource('Empresas', 'EmpresasController');
    Route::resource('conferencistas', 'ConferencistasController');
    Route::resource('relacionistas', 'RelacionistasController');
    Route::resource('conferencias', 'ConferenciasController');
    Route::resource('conferenceSchedules', 'ConferenceSchedulesController');
    Route::resource('industries', 'IndustriesController');
    Route::resource('books', 'bookController');
    Route::resource('libra', 'LibranzasController');
    Route::resource('pedido', 'PedidosController');
    Route::get('/searchConferencia','LibranzasController@searchConferencia');
    Route::resource('collections', 'CollectionsController');

});