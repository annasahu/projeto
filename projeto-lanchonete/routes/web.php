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
Route::post('/lanchonete', 'LanchoneteController@storeClienteModal');

// referentes ao cliente
Route::get('/lanchonete/adicionarcliente', 'LanchoneteController@adicionarCliente')->name('form_adicionar_cliente');
Route::get('/lanchonete/listarclientes', 'LanchoneteController@listarClientes')->name('listar_clientes');
Route::post('/lanchonete/adicionarcliente', 'LanchoneteController@storeClient');
Route::delete('/lanchonete/listarclientes/{id}', 'LanchoneteController@destroy');




