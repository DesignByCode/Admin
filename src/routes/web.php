<?php

Route::group(

    [
        'middleware' => ['web', 'auth', 'role:super-admin'],
        'namespace' => 'DesignByCode\Admin\Http\Controllers\Admin',
        'prefix' => 'admin',
        'as' => 'admin.'], function(){

    /**
     * Root
     */
    Route::get('/', 'AdminController@index')->name('index');
    /**
     * Categories
     */
    Route::get('categories', 'CategoriesController@index')->name('categories.index');
    Route::get('categories/{category}', 'CategoriesController@edit')->name('categories.edit');
    /**
     * Gallery
     */
    Route::get('galleries', 'GalleriesController@index')->name('galleries.index');
    Route::get('galleries/{gallery}', 'GalleriesController@edit')->name('galleries.edit');
    /*
     * Products
     */
    Route::get('products', 'ProductsController@index')->name('products.index');
    Route::get('products/{product}', 'ProductsController@edit')->name('product.edit');

    /**
     * Users
     */
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::get('users/{user}', 'UsersController@edit')->name('users.edit');

    /**
     * Tags
     */
    Route::get('tags', 'TagsController@index')->name('tags.index');
    Route::get('tags/{tag}', 'TagsController@edit')->name('tags.edit');

    /**
     * Notifacations
     */
//    Route::get('notifacation', 'NotifacationsController@index')->name('notifacation.index');


    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs.index');

});


Route::group(['middleware' => ['web'] ,'namespace' => 'DesignByCode\Admin\Http\Controllers\Auth'], function() {
    Route::get('login/{service}', 'SocialLoginController@redirect')->name('login.service');
    Route::get('login/{service}/callback', 'SocialLoginController@callback')->name('login.service.callback');
});
