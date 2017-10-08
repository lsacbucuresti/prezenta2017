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

Route::get('/code', 'CodesController@index');
Route::post('/code','CodesController@create');
Route::get('/prezenta','PresenceController@index');
Route::post('/prezenta','PresenceController@create');
Route::get('/lista-prezenta/{page?}','PresenceController@lista');
Route::get('/list/{date}/{id}','PresenceController@show');