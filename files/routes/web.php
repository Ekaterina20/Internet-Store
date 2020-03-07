<?php

/*Route::get('/', 'Admin\AdminController@signup');*/
Route::namespace('Site')->group(function() {
        Route::get('/', 'SiteController@index');
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', 'CategoriesSiteController@index');
        });
        Route::group(['prefix' => 'products'], function () {
            Route::get('/', 'ProductsSiteController@index');
        });
});

Route::namespace('Admin')->group(function() {
    /*'middleware'=>'auth'  чтобы защитить маршрут при входе*/
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::get('/', 'AdminController@index')->name('admin');

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', 'CategoriesController@index');
            Route::get('/create', 'CategoriesController@create');
            Route::put('/store', 'CategoriesController@store');
            Route::get('/{category}/edit', 'CategoriesController@edit');
            Route::post('/{category}/edit', 'CategoriesController@update');
            Route::delete('/{category}/delete', 'CategoriesController@delete');
        });
        Route::group(['prefix' => 'products'], function () {
            Route::get('/', 'ProductsController@index');
            Route::get('/create', 'ProductsController@create');
            Route::put('/store', 'ProductsController@store');
            Route::get('/{product}/edit', 'ProductsController@edit');
            Route::post('/{product}/edit', 'ProductsController@update');
            Route::delete('/{product}/delete', 'ProductsController@delete');
    });

    });
});



Auth::routes();

/*Route::get('/','HomeController@index');*/

Route::get('/home', 'HomeController@index')->name('admin');