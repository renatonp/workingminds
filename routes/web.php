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

Route ::get('/listarEstados','EstadoController@update')->name('listarEstados');
Route ::get('/cadastrarEstado','EstadoController@store')->name('cadastrarEstado');
Route ::get('/atualizarEstado','EstadoController@update')->name('atualizarEstado');
Route ::get('/removerEstado','EstadoController@delete')->name('removerEstado');

Route ::get('/listarCidades','CidadeController@update')->name('listarCidades');
Route ::get('/cadastrarCidade','CidadeController@store')->name('cadastrarCidade');
Route ::get('/atualizarCidade','CidadeController@update')->name('atualizarCidade');
Route ::get('/removerCidade','CidadeController@delete')->name('removerCidade');
