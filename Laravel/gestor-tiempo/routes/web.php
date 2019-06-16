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


/* Inicio */
Route::get('/', 'TiempoController@index');

Route::post('/', 'TiempoController@store');

Route::put('/edit/{id}', 'TiempoController@update');

Route::delete('/delete/{id}', 'TiempoController@destroy');

Route::post('/reiniciar', 'TiempoController@reiniciar');