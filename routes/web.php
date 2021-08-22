<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\prolat;

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
    $prolat = prolat::where('status',1)->first();
    return view('welcome',compact('prolat'));
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class,'index'])->name('login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upt', 'Auth\RegisterController@get_upt')->name('kanwil.upt');

Route::name('transaksi')->prefix('/transaksi')->group(function () {
    Route::get('/', 'TransaksiController@index');

    Route::get('getSubDiklat', 'TransaksiController@getSubDiklat')->name('.getSubDiklat');
    Route::get('getSubDiklatEdit', 'TransaksiController@getSubDiklatEdit')->name('.getSubDiklatEdit');
    Route::post('/store', 'TransaksiController@store')->name('.store');
    Route::delete('/reset', 'TransaksiController@reset')->name('.reset');
    Route::post('/saveall', 'TransaksiController@saveAll')->name('.saveall');
    Route::delete('/resetall', 'TransaksiController@resetAll')->name('.resetall');
    Route::get('getUsulan', 'TransaksiController@getUsulan')->name('.getUsulan');

});


//diklat
Route::name('diklat')->prefix('/diklat')->group(function () {
    Route::get('/', 'DiklatController@index')->name('.index');
    Route::post('/', 'DiklatController@store');
    Route::get('/data', 'DiklatController@data')->name('.data');
    Route::get('/{id}/edit', 'DiklatController@edit')->name('.edit');
    Route::put('/{id}', 'DiklatController@update')->name('.update');
    Route::delete('/', 'DiklatController@destroy')->name('.delete');
});

//kanwil
Route::name('kanwil')->prefix('/kanwil')->group(function () {
    Route::get('/', 'KanwilController@index')->name('.index');
    Route::post('/', 'KanwilController@store');
    Route::get('/data', 'KanwilController@data')->name('.data');
    Route::get('/{id}/edit', 'KanwilController@edit')->name('.edit');
    Route::put('/{id}', 'KanwilController@update')->name('.update');
    Route::delete('/', 'KanwilController@destroy')->name('.delete');
});


//upt
Route::name('upt')->prefix('/upt')->group(function () {
    Route::get('/', 'UptController@index')->name('.index');
    Route::post('/', 'UptController@store');
    Route::get('/data', 'UptController@data')->name('.data');
    Route::get('/{id}/edit', 'UptController@edit')->name('.edit');
    Route::put('/{id}', 'UptController@update')->name('.update');
    Route::delete('/', 'UptController@destroy')->name('.delete');
});

//pelatihan
Route::name('pelatihan')->prefix('/pelatihan')->group(function () {
    Route::get('/', 'PelatihanController@index')->name('.index');
    Route::post('/', 'PelatihanController@store');
    Route::get('/data', 'PelatihanController@data')->name('.data');
    Route::get('/{id}/edit', 'PelatihanController@edit')->name('.edit');
    Route::put('/{id}', 'PelatihanController@update')->name('.update');
    Route::delete('/', 'PelatihanController@destroy')->name('.delete');
});

//prolat
Route::name('prolat')->prefix('/prolat')->group(function () {
    Route::get('/', 'ProlatController@index')->name('.index');
    Route::post('/', 'ProlatController@store');
    Route::get('/data', 'ProlatController@data')->name('.data');
    Route::get('/{id}/edit', 'ProlatController@edit')->name('.edit');
    Route::put('/{id}', 'ProlatController@update')->name('.update');
    Route::delete('/', 'ProlatController@destroy')->name('.delete');
});