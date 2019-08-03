<?php


Route::group(
    [
        'middleware' => ['web', 'auth'],
        'namespace' => 'DesignByCode\Admin\Http\Controllers\Api\Admin',
        'prefix' => 'api'
        ], function(){
    /**
     * Categories
     */
    Route::apiResource('categories', 'CategoriesController');
    Route::post('categories/{category}/upload', 'CategoriesController@upload')->name('api.categories.upload');
    Route::delete('categories/{category}', 'CategoriesController@delete_image')->name('api.categories.image.delete');
    /**
     * Products
     */
    Route::apiResource('products', 'ProductsController');
    Route::post('products/{product}/active', 'ProductsController@updateActive')->name('api.products.activate');
    Route::post('products/{product}/upload', 'ProductsController@upload')->name('api.products.upload');
    Route::delete('products/{product}', 'ProductsController@delete_image')->name('api.products.image.delete');
    /**
     * Galleries
     */
    Route::apiResource('galleries', 'GalleriesController');
    Route::post('galleries/{gallery}/upload', 'GalleriesController@upload')->name('api.galleries.upload');
    Route::delete('galleries/{gallery}', 'GalleriesController@delete_image')->name('api.galleries.image.delete');
    /**
     * Tags
     */
    Route::apiResource('tags', 'TagsController');
    /**
     * Chats
     */
    Route::get("charts/categories", "ChartsController@categories_added");
    Route::get("charts/products", "ChartsController@products_count");
    Route::get("charts/product/{product}", "ChartsController@single_products_count");
    Route::get("charts/users", "ChartsController@users_added");

    /**
     * Model Counters
     */
    Route::get('counter/users', 'CounterModelsController@users');
    Route::get('counter/products', 'CounterModelsController@products');


});


Route::group(
    [
        'middleware' => ['web', 'auth'],
        'namespace' => 'DesignByCode\Admin\Http\Controllers\DataTables',
        'prefix' => 'datatables',
        'as' => 'datatables.'
    ], function() {

    Route::resource('users', 'UsersController');

    Route::resource('products', 'ProductsController');

    Route::resource('categories', 'CategoriesController');

    Route::resource('galleries', 'GalleriesController');

    Route::resource('tags', 'TagsController');


});
