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

// Route::get('/', function () {
//     return view('welcome');
// });

// テスト

Route::get('/', 'ClientsController@index')->name('client.index');

Route::get('/client', 'ClientsController@client')->name('client');
Route::get('/export', 'ClientsController@export')->name('export');

Route::get('/im', 'ClientsController@im')->name('im');
Route::post('/import', 'ClientsController@import')->name('import');
