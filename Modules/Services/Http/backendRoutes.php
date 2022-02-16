<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/services'], function (Router $router) {
    $router->bind('service', function ($id) {
        return app('Modules\Services\Repositories\ServiceRepository')->find($id);
    });
    $router->get('services', [
        'as' => 'admin.services.service.index',
        'uses' => 'ServiceController@index',
        'middleware' => 'can:services.services.index'
    ]);
    $router->get('services/create', [
        'as' => 'admin.services.service.create',
        'uses' => 'ServiceController@create',
        'middleware' => 'can:services.services.create'
    ]);
    $router->post('services', [
        'as' => 'admin.services.service.store',
        'uses' => 'ServiceController@store',
        'middleware' => 'can:services.services.create'
    ]);
    $router->get('services/{service}/edit', [
        'as' => 'admin.services.service.edit',
        'uses' => 'ServiceController@edit',
        'middleware' => 'can:services.services.edit'
    ]);
    $router->put('services/{service}', [
        'as' => 'admin.services.service.update',
        'uses' => 'ServiceController@update',
        'middleware' => 'can:services.services.edit'
    ]);
    $router->delete('services/{service}', [
        'as' => 'admin.services.service.destroy',
        'uses' => 'ServiceController@destroy',
        'middleware' => 'can:services.services.destroy'
    ]);
    $router->bind('bookingnew', function ($id) {
        return app('Modules\Services\Repositories\BookingnewRepository')->find($id);
    });
    $router->get('bookingnews', [
        'as' => 'admin.services.bookingnew.index',
        'uses' => 'BookingnewController@index',
        'middleware' => 'can:services.bookingnews.index'
    ]);
    $router->get('bookingnews/create', [
        'as' => 'admin.services.bookingnew.create',
        'uses' => 'BookingnewController@create',
        'middleware' => 'can:services.bookingnews.create'
    ]);
    $router->post('bookingnews', [
        'as' => 'admin.services.bookingnew.store',
        'uses' => 'BookingnewController@store',
        'middleware' => 'can:services.bookingnews.create'
    ]);
    $router->get('bookingnews/{bookingnew}/edit', [
        'as' => 'admin.services.bookingnew.edit',
        'uses' => 'BookingnewController@edit',
        'middleware' => 'can:services.bookingnews.edit'
    ]);
    $router->put('bookingnews/{bookingnew}', [
        'as' => 'admin.services.bookingnew.update',
        'uses' => 'BookingnewController@update',
        'middleware' => 'can:services.bookingnews.edit'
    ]);
    $router->delete('bookingnews/{bookingnew}', [
        'as' => 'admin.services.bookingnew.destroy',
        'uses' => 'BookingnewController@destroy',
        'middleware' => 'can:services.bookingnews.destroy'
    ]);
      $router->post('bookingnews/cancel', [
        'as' => 'admin.services.bookingnew.cancel',
        'uses' => 'BookingnewController@cancel',
        'middleware' => 'can:services.bookingnews.create'
    ]);
    $router->bind('bookingong', function ($id) {
        return app('Modules\Services\Repositories\BookingongRepository')->find($id);
    });
    $router->get('bookingongs', [
        'as' => 'admin.services.bookingong.index',
        'uses' => 'BookingongController@index',
        'middleware' => 'can:services.bookingongs.index'
    ]);
    $router->get('bookingongs/create', [
        'as' => 'admin.services.bookingong.create',
        'uses' => 'BookingongController@create',
        'middleware' => 'can:services.bookingongs.create'
    ]);
    $router->post('bookingongs', [
        'as' => 'admin.services.bookingong.store',
        'uses' => 'BookingongController@store',
        'middleware' => 'can:services.bookingongs.create'
    ]);
    $router->get('bookingongs/{bookingong}/edit', [
        'as' => 'admin.services.bookingong.edit',
        'uses' => 'BookingongController@edit',
        'middleware' => 'can:services.bookingongs.edit'
    ]);
    $router->put('bookingongs/{bookingong}', [
        'as' => 'admin.services.bookingong.update',
        'uses' => 'BookingongController@update',
        'middleware' => 'can:services.bookingongs.edit'
    ]);
    $router->delete('bookingongs/{bookingong}', [
        'as' => 'admin.services.bookingong.destroy',
        'uses' => 'BookingongController@destroy',
        'middleware' => 'can:services.bookingongs.destroy'
    ]);
    $router->bind('bookingcom', function ($id) {
        return app('Modules\Services\Repositories\BookingcomRepository')->find($id);
    });
    $router->get('bookingcoms', [
        'as' => 'admin.services.bookingcom.index',
        'uses' => 'BookingcomController@index',
        'middleware' => 'can:services.bookingcoms.index'
    ]);
    $router->get('bookingcoms/create', [
        'as' => 'admin.services.bookingcom.create',
        'uses' => 'BookingcomController@create',
        'middleware' => 'can:services.bookingcoms.create'
    ]);
    $router->post('bookingcoms', [
        'as' => 'admin.services.bookingcom.store',
        'uses' => 'BookingcomController@store',
        'middleware' => 'can:services.bookingcoms.create'
    ]);
    $router->get('bookingcoms/{bookingcom}/edit', [
        'as' => 'admin.services.bookingcom.edit',
        'uses' => 'BookingcomController@edit',
        'middleware' => 'can:services.bookingcoms.edit'
    ]);
    $router->put('bookingcoms/{bookingcom}', [
        'as' => 'admin.services.bookingcom.update',
        'uses' => 'BookingcomController@update',
        'middleware' => 'can:services.bookingcoms.edit'
    ]);
    $router->delete('bookingcoms/{bookingcom}', [
        'as' => 'admin.services.bookingcom.destroy',
        'uses' => 'BookingcomController@destroy',
        'middleware' => 'can:services.bookingcoms.destroy'
    ]);
// append




});
