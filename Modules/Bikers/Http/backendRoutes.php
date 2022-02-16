<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/bikers'], function (Router $router) {
    $router->bind('biker', function ($id) {
        return app('Modules\Bikers\Repositories\BikerRepository')->find($id);
    });
    $router->get('bikers', [
        'as' => 'admin.bikers.biker.index',
        'uses' => 'BikerController@index',
        'middleware' => 'can:bikers.bikers.index'
    ]);
    $router->get('bikers/create', [
        'as' => 'admin.bikers.biker.create',
        'uses' => 'BikerController@create',
        'middleware' => 'can:bikers.bikers.create'
    ]);
    $router->post('bikers', [
        'as' => 'admin.bikers.biker.store',
        'uses' => 'BikerController@store',
        'middleware' => 'can:bikers.bikers.create'
    ]);
    $router->get('bikers/{biker}/edit', [
        'as' => 'admin.bikers.biker.edit',
        'uses' => 'BikerController@edit',
        'middleware' => 'can:bikers.bikers.edit'
    ]);
    $router->put('bikers/{biker}', [
        'as' => 'admin.bikers.biker.update',
        'uses' => 'BikerController@update',
        'middleware' => 'can:bikers.bikers.edit'
    ]);
    $router->delete('bikers/{biker}', [
        'as' => 'admin.bikers.biker.destroy',
        'uses' => 'BikerController@destroy',
        'middleware' => 'can:bikers.bikers.destroy'
    ]);
// append

});
