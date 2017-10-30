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

Route::get('/home', 'HomeController@index');

Route::get('/clients', 'ClientController@index');
Route::get('/client/create', 'ClientController@create');
Route::post('/client/store', 'ClientController@store');
Route::post('/client/{id}/edit', 'ClientController@edit');
Route::put('/client/{id}', 'ClientController@update');
Route::delete('/client/{id}/delete', 'ClientController@destroy');
Route::get('clients/{id}', 'ClientController@show');

Route::get('/bills', 'BillController@index');
Route::get('/bill/create', 'BillController@create');
