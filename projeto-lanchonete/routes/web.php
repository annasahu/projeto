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
Route::get('/lanchonete/listarclientes', 'ClientesController@listarClientes')->name('listar_clientes');
Route::get('/lanchonete/listarclientes/adicionarcliente', 'ClientesController@adicionarCliente')->name('form_adicionar_cliente');
Route::post('/lanchonete/listarclientes/adicionarcliente', 'ClientesController@storeCliente')->name('adicionar_cliente');
Route::post('/lanchonete', 'ClientesController@storeClienteModal'); //modal
Route::delete('/lanchonete/listarclientes/{id}', 'ClientesController@destroyCliente');
//Route::edit()->name('editar_cliente');

// referentes a adicionais

// referentes a bebidas

// referentes a lanches
Route::get('/lanchonete/listarlanches', 'LanchesController@listarLanches')->name('listar_lanches');
Route::get('/lanchonete/listarlanches/adicionarlanche', 'LanchesController@adicionarLanche')->name('form_adicionar_lanche');
Route::post('/lanchonete/listarlanches/adicionarlanche', 'LanchesController@storeLanche')->name('adicionar_lanche');
Route::post('/lanchonete', 'LanchesController@storeLancheModal'); //modal
Route::delete('/lanchonete/listarlanches/{id}', 'LanchesController@destroyLanche');
 //Route::edit()->name('editar_lanche');
