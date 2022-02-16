<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/vehiclem'], function (Router $router) {
    $router->bind('brand', function ($id) {
        return app('Modules\Vehiclem\Repositories\BrandRepository')->find($id);
    });
    $router->get('brands', [
        'as' => 'admin.vehiclem.brand.index',
        'uses' => 'BrandController@index',
        'middleware' => 'can:vehiclem.brands.index'
    ]);
    $router->get('brands/create', [
        'as' => 'admin.vehiclem.brand.create',
        'uses' => 'BrandController@create',
        'middleware' => 'can:vehiclem.brands.create'
    ]);
    $router->post('brands', [
        'as' => 'admin.vehiclem.brand.store',
        'uses' => 'BrandController@store',
        'middleware' => 'can:vehiclem.brands.create'
    ]);
    $router->get('brands/{brand}/edit', [
        'as' => 'admin.vehiclem.brand.edit',
        'uses' => 'BrandController@edit',
        'middleware' => 'can:vehiclem.brands.edit'
    ]);
    $router->put('brands/{brand}', [
        'as' => 'admin.vehiclem.brand.update',
        'uses' => 'BrandController@update',
        'middleware' => 'can:vehiclem.brands.edit'
    ]);
    $router->delete('brands/{brand}', [
        'as' => 'admin.vehiclem.brand.destroy',
        'uses' => 'BrandController@destroy',
        'middleware' => 'can:vehiclem.brands.destroy'
    ]);
    $router->bind('bmodel', function ($id) {
        return app('Modules\Vehiclem\Repositories\BmodelRepository')->find($id);
    });
    $router->get('bmodels', [
        'as' => 'admin.vehiclem.bmodel.index',
        'uses' => 'BmodelController@index',
        'middleware' => 'can:vehiclem.bmodels.index'
    ]);
    $router->get('bmodels/create', [
        'as' => 'admin.vehiclem.bmodel.create',
        'uses' => 'BmodelController@create',
        'middleware' => 'can:vehiclem.bmodels.create'
    ]);
    $router->post('bmodels', [
        'as' => 'admin.vehiclem.bmodel.store',
        'uses' => 'BmodelController@store',
        'middleware' => 'can:vehiclem.bmodels.create'
    ]);
    $router->get('bmodels/{bmodel}/edit', [
        'as' => 'admin.vehiclem.bmodel.edit',
        'uses' => 'BmodelController@edit',
        'middleware' => 'can:vehiclem.bmodels.edit'
    ]);
    $router->put('bmodels/{bmodel}', [
        'as' => 'admin.vehiclem.bmodel.update',
        'uses' => 'BmodelController@update',
        'middleware' => 'can:vehiclem.bmodels.edit'
    ]);
    $router->delete('bmodels/{bmodel}', [
        'as' => 'admin.vehiclem.bmodel.destroy',
        'uses' => 'BmodelController@destroy',
        'middleware' => 'can:vehiclem.bmodels.destroy'
    ]);
// append


});
