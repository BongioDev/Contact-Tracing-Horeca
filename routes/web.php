<?php

use Illuminate\Support\Facades\Route;
use App\User;

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

Route::get('/contacttracing/client/dashboard/getdata/download/{datum}', 'clientController@downloadData')->middleware('auth');

Route::get('/contacttracing/client/dashboard/help', 'clientController@help')->middleware('auth');

Route::get('/contacttracing/client/dashboard/QR', function () {
    $client = User::where('id', auth()->user()->id)->first();
    return view('qrClient')->with('client', $client);
});

Route::get('/contacttracing/client/dashboard/QRQR', 'clientController@getQR')->middleware('auth');

Route::get('/contacttracing/client/dashboard/QRdownload', 'clientController@getQR')->middleware('auth');

Route::get('/contacttracing/client/dashboard/logo', function () {
    $client = User::where('id', auth()->user()->id)->first();
    return view('uploadLogo')->with('client', $client);
});

Route::post('/contacttracing/client/dashboard/logo', 'clientController@uploadLogo')->middleware('auth');

Route::get('/contacttracing/client/dashboard/changepass', function () {
    return view('auth.changepass');
});

Route::post('/changePassword','ClientController@changePassword')->name('changePassword')->middleware('auth');

Route::post('/contactMail','ClientController@contactMail');

Route::post('/register','ClientController@register');
