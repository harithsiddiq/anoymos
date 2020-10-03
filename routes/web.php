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

Route::group(['middleware' => 'maintenance'], function() {
    Route::get('/', function () {
        return view('front.home');
    });
});
Route::get('test', function () {
   $dep = \App\Models\Dashboard\Size::get();
   return $dep;
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
