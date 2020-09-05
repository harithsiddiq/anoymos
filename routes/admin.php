<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'namespace' => 'dashboard'], function() {
    // admin dashboard
    Route::group(['middleware' => 'auth:admin'], function() {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::get('/logout','AdminAuthController@logout')->name('admin.logout');
    });

    // admin login
    Route::group(['prefix' => 'login', 'middleware' => 'guest:admin'], function() {
        Route::get('', 'AdminAuthController@loginForm')->name('admin.loginForm');
        Route::post('', 'AdminAuthController@login')->name('admin.login');
    });

    Route::get('forget-password', 'AdminAuthController@forgetPassword')->name('admin.forget_form');
    Route::post('forget-password', 'AdminAuthController@forgetPasswordPost')->name('admin.forget_post');

});
