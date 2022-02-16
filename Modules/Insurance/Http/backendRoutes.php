<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/insurance'], function (Router $router) {
    $router->bind('newi', function ($id) {
        return app('Modules\Insurance\Repositories\NewiRepository')->find($id);
    });
    $router->get('newis', [
        'as' => 'admin.insurance.newi.index',
        'uses' => 'NewiController@index',
        'middleware' => 'can:insurance.newis.index'
    ]);
    $router->get('newis/create', [
        'as' => 'admin.insurance.newi.create',
        'uses' => 'NewiController@create',
        'middleware' => 'can:insurance.newis.create'
    ]);
    $router->post('newis', [
        'as' => 'admin.insurance.newi.store',
        'uses' => 'NewiController@store',
        'middleware' => 'can:insurance.newis.create'
    ]);
      $router->post('newis/cancel', [
        'as' => 'admin.insurance.newi.cancel',
        'uses' => 'NewiController@cancel',
        'middleware' => 'can:insurance.newis.create'
    ]);
    $router->get('newis/{newi}/edit', [
        'as' => 'admin.insurance.newi.edit',
        'uses' => 'NewiController@edit',
        'middleware' => 'can:insurance.newis.edit'
    ]);
    $router->put('newis/{newi}', [
        'as' => 'admin.insurance.newi.update',
        'uses' => 'NewiController@update',
        'middleware' => 'can:insurance.newis.edit'
    ]);
    $router->delete('newis/{newi}', [
        'as' => 'admin.insurance.newi.destroy',
        'uses' => 'NewiController@destroy',
        'middleware' => 'can:insurance.newis.destroy'
    ]);
    $router->bind('oni', function ($id) {
        return app('Modules\Insurance\Repositories\OniRepository')->find($id);
    });
    $router->get('onis', [
        'as' => 'admin.insurance.oni.index',
        'uses' => 'OniController@index',
        'middleware' => 'can:insurance.onis.index'
    ]);
    $router->get('onis/create', [
        'as' => 'admin.insurance.oni.create',
        'uses' => 'OniController@create',
        'middleware' => 'can:insurance.onis.create'
    ]);
    $router->post('onis', [
        'as' => 'admin.insurance.oni.store',
        'uses' => 'OniController@store',
        'middleware' => 'can:insurance.onis.create'
    ]);
    $router->get('onis/{oni}/edit', [
        'as' => 'admin.insurance.oni.edit',
        'uses' => 'OniController@edit',
        'middleware' => 'can:insurance.onis.edit'
    ]);
    $router->put('onis/{oni}', [
        'as' => 'admin.insurance.oni.update',
        'uses' => 'OniController@update',
        'middleware' => 'can:insurance.onis.edit'
    ]);
    $router->delete('onis/{oni}', [
        'as' => 'admin.insurance.oni.destroy',
        'uses' => 'OniController@destroy',
        'middleware' => 'can:insurance.onis.destroy'
    ]);
    $router->bind('comi', function ($id) {
        return app('Modules\Insurance\Repositories\ComiRepository')->find($id);
    });
    $router->get('comis', [
        'as' => 'admin.insurance.comi.index',
        'uses' => 'ComiController@index',
        'middleware' => 'can:insurance.comis.index'
    ]);
    $router->get('comis/create', [
        'as' => 'admin.insurance.comi.create',
        'uses' => 'ComiController@create',
        'middleware' => 'can:insurance.comis.create'
    ]);
    $router->post('comis', [
        'as' => 'admin.insurance.comi.store',
        'uses' => 'ComiController@store',
        'middleware' => 'can:insurance.comis.create'
    ]);
    $router->get('comis/{comi}/edit', [
        'as' => 'admin.insurance.comi.edit',
        'uses' => 'ComiController@edit',
        'middleware' => 'can:insurance.comis.edit'
    ]);
    $router->put('comis/{comi}', [
        'as' => 'admin.insurance.comi.update',
        'uses' => 'ComiController@update',
        'middleware' => 'can:insurance.comis.edit'
    ]);
    $router->delete('comis/{comi}', [
        'as' => 'admin.insurance.comi.destroy',
        'uses' => 'ComiController@destroy',
        'middleware' => 'can:insurance.comis.destroy'
    ]);
    $router->bind('cani', function ($id) {
        return app('Modules\Insurance\Repositories\CaniRepository')->find($id);
    });
    $router->get('canis', [
        'as' => 'admin.insurance.cani.index',
        'uses' => 'CaniController@index',
        'middleware' => 'can:insurance.canis.index'
    ]);
    $router->get('canis/create', [
        'as' => 'admin.insurance.cani.create',
        'uses' => 'CaniController@create',
        'middleware' => 'can:insurance.canis.create'
    ]);
    $router->post('canis', [
        'as' => 'admin.insurance.cani.store',
        'uses' => 'CaniController@store',
        'middleware' => 'can:insurance.canis.create'
    ]);
    $router->get('canis/{cani}/edit', [
        'as' => 'admin.insurance.cani.edit',
        'uses' => 'CaniController@edit',
        'middleware' => 'can:insurance.canis.edit'
    ]);
    $router->put('canis/{cani}', [
        'as' => 'admin.insurance.cani.update',
        'uses' => 'CaniController@update',
        'middleware' => 'can:insurance.canis.edit'
    ]);
    $router->delete('canis/{cani}', [
        'as' => 'admin.insurance.cani.destroy',
        'uses' => 'CaniController@destroy',
        'middleware' => 'can:insurance.canis.destroy'
    ]);
// append




});
