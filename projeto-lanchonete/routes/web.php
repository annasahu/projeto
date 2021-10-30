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

Route::get('/lanchonete', 'LanchoneteController@index')->name('index');

// referentes ao cliente
Route::get('/lanchonete/adicionarcliente', 'LanchoneteController@adicionarCliente')->name('form_adicionar_cliente');
Route::get('/lanchonete/listarclientes', 'LanchoneteController@listarClientes')->name('listar_clientes');
Route::post('/lanchonete/adicionarcliente', 'LanchoneteController@storeCliente');
Route::post('/lanchonete', 'LanchoneteController@storeClienteModal'); //modal
Route::delete('/lanchonete/listarclientes/{id}', 'LanchoneteController@destroyCliente');

// referentes a adicionais

// referentes a bebidas

// referentes a lanches
Route::get('/lanchonete/adicionarlanche', 'LanchoneteController@adicionarLanche')->name('form_adicionar_lanche');
Route::get('/lanchonete/listarlanches', 'LanchoneteController@listarLanches')->name('listar_lanches');
Route::post('/lanchonete/adicionarlanche', 'LanchoneteController@storeLanche');
Route::post('/lanchonete', 'LanchoneteController@storeLancheModal'); //modal
Route::delete('/lanchonete/listarlanches/{id}', 'LanchoneteController@destroyLanche');




