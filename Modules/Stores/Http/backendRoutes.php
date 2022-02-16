<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/stores'], function (Router $router) {
    $router->bind('stores', function ($id) {
        return app('Modules\Stores\Repositories\StoresRepository')->find($id);
    });
    $router->get('stores', [
        'as' => 'admin.stores.stores.index',
        'uses' => 'StoresController@index',
        'middleware' => 'can:stores.stores.index'
    ]);
    $router->get('stores/create', [
        'as' => 'admin.stores.stores.create',
        'uses' => 'StoresController@create',
        'middleware' => 'can:stores.stores.create'
    ]);
    $router->post('stores', [
        'as' => 'admin.stores.stores.store',
        'uses' => 'StoresController@store',
        'middleware' => 'can:stores.stores.create'
    ]);
     $router->post('points1', [
        'as' => 'admin.stores.stores.points1',
        'uses' => 'StoresController@points1',
        'middleware' => 'can:stores.stores.create'
    ]);
    $router->get('stores/{stores}/edit', [
        'as' => 'admin.stores.stores.edit',
        'uses' => 'StoresController@edit',
        'middleware' => 'can:stores.stores.edit'
    ]);
    $router->put('stores/{stores}', [
        'as' => 'admin.stores.stores.update',
        'uses' => 'StoresController@update',
        'middleware' => 'can:stores.stores.edit'
    ]);
    $router->delete('stores/{stores}', [
        'as' => 'admin.stores.stores.destroy',
        'uses' => 'StoresController@destroy',
        'middleware' => 'can:stores.stores.destroy'
    ]);
    $router->bind('reviews', function ($id) {
        return app('Modules\Stores\Repositories\reviewsRepository')->find($id);
    });
    $router->get('reviews', [
        'as' => 'admin.stores.reviews.index',
        'uses' => 'reviewsController@index',
        'middleware' => 'can:stores.reviews.index'
    ]);
    $router->get('reviews/create', [
        'as' => 'admin.stores.reviews.create',
        'uses' => 'reviewsController@create',
        'middleware' => 'can:stores.reviews.create'
    ]);
    $router->post('reviews', [
        'as' => 'admin.stores.reviews.store',
        'uses' => 'reviewsController@store',
        'middleware' => 'can:stores.reviews.create'
    ]);
    $router->get('reviews/{reviews}/edit', [
        'as' => 'admin.stores.reviews.edit',
        'uses' => 'reviewsController@edit',
        'middleware' => 'can:stores.reviews.edit'
    ]);
    $router->put('reviews/{reviews}', [
        'as' => 'admin.stores.reviews.update',
        'uses' => 'reviewsController@update',
        'middleware' => 'can:stores.reviews.edit'
    ]);
    $router->delete('reviews/{reviews}', [
        'as' => 'admin.stores.reviews.destroy',
        'uses' => 'reviewsController@destroy',
        'middleware' => 'can:stores.reviews.destroy'
    ]);
// append


});
