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
    return view('larawelcome'); // modificar para um mock de tela de login (any name x pwd gets in)
});

Route::get('/clientes', 'ClientesController@index');

Route::get('/clientes/criar', 'ClientesController@create');
Route::post('/clientes/criar', 'ClientesController@store');

Route::get('/clientes/{id}', 'ClientesController@edit');
Route::post('/clientes/{id}', 'ClientesController@update');

//Route::get('/clientes/{id}/show', 'ClientesController@show'); // Opcional

Route::delete('/clientes/{id}', 'ClientesController@delete');
