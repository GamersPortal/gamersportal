<?php

Route::get('categories', 'CategoriesController@index');

Route::group(['prefix' => 'wpanel', 'roles' => 'admin', 'middleware' => ['auth', 'roles']], function () {
    Route::resource('/', 'WpanelController');

    Route::resource('category', 'CategoriesController',
        [
            'names' => [
                'index' => 'wpanel.category.index',
                'create' => 'wpanel.category.create',
                'store' => 'wpanel.category.store',
                'show' => 'wpanel.category.show',
                'edit' => 'wpanel.category.edit',
                'update' => 'wpanel.category.update',
                'destroy' => 'wpanel.category.destroy',
            ]
        ]
    );



    Route::post('category/upload', ['as' => 'category.upload', 'uses' => 'CategoriesController@upload']);

    Route::get('categories', ['as' => 'categories', 'uses' => 'CategoriesController@showList']);

    Route::resource('productsdetails', 'ProductDetailsController',
        [
            'names' => [
                'index' => 'wpanel.productsdetails.index',
                'create' => 'wpanel.productsdetails.create',
                'store' => 'wpanel.productsdetails.store',
                'show' => 'wpanel.productsdetails.show',
                'edit' => 'wpanel.productsdetails.edit',
                'update' => 'wpanel.productsdetails.update',
                'destroy' => 'wpanel.productsdetails.destroy',
            ]
        ]
    );

    Route::get('features', ['uses' => 'ProductDetailsController@index', 'as' => 'features']);

    Route::resource('profile', 'CompanyController',
        [
            'names' => [
                'index' => 'wpanel.profile.index',
                'create' => 'wpanel.profile.create',
                'store' => 'wpanel.profile.store',
                'show' => 'wpanel.profile.show',
                'edit' => 'wpanel.profile.edit',
                'update' => 'wpanel.profile.update',
                'destroy' => 'wpanel.profile.destroy',
            ]
        ]
    );
});