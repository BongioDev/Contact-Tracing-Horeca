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
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/loginAdmin', function () {
    return view('auth.login');
});

//dashboard admin
Route::get('/cthorecaadmin', 'AdminController@index')->middleware('admin');

Route::get('/addClient', 'AdminController@addClientView')->middleware('admin');

Route::post('/addClient', 'AdminController@addClientPost')->middleware('admin');

Route::get('/getClient', 'AdminController@getClientView')->middleware('admin');

Route::post('/getClient', 'AdminController@getClientQuery')->middleware('admin');

Route::get('/clientDetail/{client_id}', 'AdminController@getClientDetail')->middleware('admin');

Route::get('/generateQRcode/{client_id}', 'clientController@generateQRcode')->middleware('admin');

//formulier
Route::get('/contacttracing/{client_id}', 'clientController@getClientForm');

Route::post('/contacttracing/{client_id}', 'clientController@postClientForm');

//dashboard klant
Route::get('/contacttracing/client/dashboard', 'clientController@clientDashboard')->middleware('auth');

Route::get('/contacttracing/client/dashboard/getdata', 'clientController@getData')->middleware('auth');

Route::post('/contacttracing/client/dashboard/getdata', 'clientController@postData')->middleware('auth');
