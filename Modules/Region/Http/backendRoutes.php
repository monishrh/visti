<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/region'], function (Router $router) {
    $router->bind('city', function ($id) {
        return app('Modules\Region\Repositories\CityRepository')->find($id);
    });
    $router->get('cities', [
        'as' => 'admin.region.city.index',
        'uses' => 'CityController@index',
        'middleware' => 'can:region.cities.index'
    ]);
    $router->get('cities/create', [
        'as' => 'admin.region.city.create',
        'uses' => 'CityController@create',
        'middleware' => 'can:region.cities.create'
    ]);
    $router->post('cities', [
        'as' => 'admin.region.city.store',
        'uses' => 'CityController@store',
        'middleware' => 'can:region.cities.create'
    ]);
    $router->get('cities/{city}/edit', [
        'as' => 'admin.region.city.edit',
        'uses' => 'CityController@edit',
        'middleware' => 'can:region.cities.edit'
    ]);
    $router->put('cities/{city}', [
        'as' => 'admin.region.city.update',
        'uses' => 'CityController@update',
        'middleware' => 'can:region.cities.edit'
    ]);
    $router->delete('cities/{city}', [
        'as' => 'admin.region.city.destroy',
        'uses' => 'CityController@destroy',
        'middleware' => 'can:region.cities.destroy'
    ]);
    $router->bind('area', function ($id) {
        return app('Modules\Region\Repositories\AreaRepository')->find($id);
    });
    $router->get('areas', [
        'as' => 'admin.region.area.index',
        'uses' => 'AreaController@index',
        'middleware' => 'can:region.areas.index'
    ]);
    $router->get('areas/create', [
        'as' => 'admin.region.area.create',
        'uses' => 'AreaController@create',
        'middleware' => 'can:region.areas.create'
    ]);
    $router->post('areas', [
        'as' => 'admin.region.area.store',
        'uses' => 'AreaController@store',
        'middleware' => 'can:region.areas.create'
    ]);
    $router->get('areas/{area}/edit', [
        'as' => 'admin.region.area.edit',
        'uses' => 'AreaController@edit',
        'middleware' => 'can:region.areas.edit'
    ]);
    $router->put('areas/{area}', [
        'as' => 'admin.region.area.update',
        'uses' => 'AreaController@update',
        'middleware' => 'can:region.areas.edit'
    ]);
    $router->delete('areas/{area}', [
        'as' => 'admin.region.area.destroy',
        'uses' => 'AreaController@destroy',
        'middleware' => 'can:region.areas.destroy'
    ]);
// append


});
