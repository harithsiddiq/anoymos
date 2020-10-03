<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'namespace' => 'dashboard', 'middleware' => 'lang'], function () {

    // admin dashboard
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::get('/logout', 'AdminAuthController@logout')->name('admin.logout');
        Route::post('delete/all', 'AdminController@multi_delete')->name('admins.delete_all');

        // admins
        Route::resource('/admins', 'AdminController');
        // users
        Route::resource('/users', 'UserController');

        // website settings
        Route::group(['prefix' => 'setting'], function () {
            Route::get('', 'SettingController@setting')->name('admin.setting');
            Route::post('', 'SettingController@save_setting')->name('admin.save_setting');
        });

        // countries
        Route::group(['prefix' => 'countries'], function () {
            Route::get('', 'CountryController@index')->name('country.index');
            Route::get('create', 'CountryController@create')->name('country.country');
            Route::post('store', 'CountryController@store')->name('country.store');
            Route::get('edit/{id}', 'CountryController@edit')->name('country.edit');
            Route::post('update/{id}', 'CountryController@update')->name('country.update');
            Route::post('destroy/{id}', 'CountryController@destroy')->name('country.destroy');
        });

        // cities
        Route::group(['prefix' => 'cities'], function () {
            Route::get('', 'CityController@index')->name('city.index');
            Route::get('create', 'CityController@create')->name('city.create');
            Route::post('store', 'CityController@store')->name('city.store');
            Route::get('edit/{id}', 'CityController@edit')->name('city.edit');
            Route::post('update/{id}', 'CityController@update')->name('city.update');
            Route::post('destroy/{id}', 'CityController@destroy')->name('city.destroy');
        });

        // states
        Route::group(['prefix' => 'states'], function () {
            Route::get('', 'StateController@index')->name('state.index');
            Route::get('create', 'StateController@create')->name('state.create');
            Route::post('store', 'StateController@store')->name('state.store');
            Route::get('edit/{id}', 'StateController@edit')->name('state.edit');
            Route::post('update/{id}', 'StateController@update')->name('state.update');
            Route::post('destroy/{id}', 'StateController@destroy')->name('state.destroy');
            Route::post('city', 'StateController@getCity')->name('state.city');
        });

        // departments
        Route::group(['prefix' => 'departments'], function () {
            Route::get('', 'DepartmentController@index')->name('departments.index');
            Route::get('create', 'DepartmentController@create')->name('departments.create');
            Route::post('store', 'DepartmentController@store')->name('departments.store');
            Route::get('edit/{id}', 'DepartmentController@edit')->name('departments.edit');
            Route::post('update/{id}', 'DepartmentController@update')->name('departments.update');
            Route::get('destroy/{id}', 'DepartmentController@destroy')->name('departments.destroy');
        });

        // brands
        Route::group(['prefix' => 'brands'], function () {
            Route::get('', 'BrandController@index')->name('brand.index');
            Route::post('', 'BrandController@store')->name('brand.store');
            Route::get('create', 'BrandController@create')->name('brand.create');
            Route::get('edit/{id}', 'BrandController@edit')->name('brand.edit');
            Route::post('update/{id}', 'BrandController@update')->name('brand.update');
            Route::post('destroy/{id}', 'BrandController@destroy')->name('brand.destroy');
        });

        // manufacturers
        Route::group(['prefix' => 'manufacturers'], function () {
            Route::get('', 'ManufacturersController@index')->name('manufacturer.index');
            Route::post('', 'ManufacturersController@store')->name('manufacturer.store');
            Route::get('create', 'ManufacturersController@create')->name('manufacturer.create');
            Route::get('edit/{id}', 'ManufacturersController@edit')->name('manufacturer.edit');
            Route::post('update/{id}', 'ManufacturersController@update')->name('manufacturer.update');
            Route::post('destroy/{id}', 'ManufacturersController@destroy')->name('manufacturer.destroy');
        });

        // shipping
        Route::group(['prefix' => 'shipping'], function () {
            Route::get('', 'ShippingController@index')->name('shipping.index');
            Route::post('', 'ShippingController@store')->name('shipping.store');
            Route::get('create', 'ShippingController@create')->name('shipping.create');
            Route::get('edit/{id}', 'ShippingController@edit')->name('shipping.edit');
            Route::post('update/{id}', 'ShippingController@update')->name('shipping.update');
            Route::delete('destroy/{id}', 'ShippingController@destroy')->name('shipping.destroy');
        });


        // Mall
        Route::group(['prefix' => 'malls'], function () {
            Route::get('', 'MallController@index')->name('mall.index');
            Route::post('', 'MallController@store')->name('mall.store');
            Route::get('create', 'MallController@create')->name('mall.create');
            Route::get('edit/{id}', 'MallController@edit')->name('mall.edit');
            Route::post('update/{id}', 'MallController@update')->name('mall.update');
            Route::delete('destroy/{id}', 'MallController@destroy')->name('mall.destroy');
        });

        // Color
        Route::group(['prefix' => 'colors'], function () {
            Route::get('', 'ColorController@index')->name('color.index');
            Route::post('', 'ColorController@store')->name('color.store');
            Route::get('create', 'ColorController@create')->name('color.create');
            Route::get('edit/{id}', 'ColorController@edit')->name('color.edit');
            Route::post('update/{id}', 'ColorController@update')->name('color.update');
            Route::delete('destroy/{id}', 'ColorController@destroy')->name('color.destroy');
        });

        // Size
        Route::group(['prefix' => 'size'], function () {
            Route::get('', 'SizeController@index')->name('size.index');
            Route::post('', 'SizeController@store')->name('size.store');
            Route::get('create', 'SizeController@create')->name('size.create');
            Route::get('edit/{id}', 'SizeController@edit')->name('size.edit');
            Route::post('update/{id}', 'SizeController@update')->name('size.update');
            Route::delete('destroy/{id}', 'SizeController@destroy')->name('size.destroy');
        });

        // Product
        Route::group(['prefix' => 'products'], function () {
            Route::get('', 'ProductController@index')->name('product.index');
            Route::post('', 'ProductController@store')->name('product.store');
            Route::get('create', 'ProductController@create')->name('product.create');
            Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
            Route::post('update/{id}', 'ProductController@update')->name('product.update');
            Route::delete('destroy/{id}', 'ProductController@destroy')->name('product.destroy');
        });

    });

    // admin login
    Route::group(['prefix' => 'login', 'middleware' => 'guest:admin'], function () {
        Route::get('', 'AdminAuthController@loginForm')->name('admin.loginForm');
        Route::post('', 'AdminAuthController@login')->name('admin.login');
    });

    // admin password reset
    Route::get('forget-password', 'AdminAuthController@forgetPassword')->name('admin.forget_form');
    Route::post('forget-password', 'AdminAuthController@forgetPasswordPost')->name('admin.forget_post');
    Route::get('reset/password/{token}', 'AdminAuthController@reset')->name('admin.reset');
    Route::post('reset/password/{token}', 'AdminAuthController@reset_post')->name('admin.reset_post');

});


// setting controller
Route::get('lang/{lang}', 'setting\LanguageController')->name('lang');
Route::get('close', function() {
    return view('front.close');
})->name('close');

