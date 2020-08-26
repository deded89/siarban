<?php

use Illuminate\Support\Facades\Route;
use Spatie\Browsershot\Browsershot;

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
    return redirect()->route('qurbans.index');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('qurbans', 'QurbanController');

Route::post('slot/{qurban}', 'SlotController@store')->name('slot.store');
Route::delete('slot/{slot}', 'SlotController@destroy')->name('slot.delete');

Route::get('slot/{slot}', 'AngsuranController@index')->name('slot.angsurans');
Route::post('angsuran/{slot}', 'AngsuranController@store')->name('angsuran.store');
Route::delete('angsuran/{angsuran}', 'AngsuranController@destroy')->name('angsuran.delete');
Route::get('angsuran/{angsuran}/show', 'AngsuranController@show')->name('angsuran.show');
