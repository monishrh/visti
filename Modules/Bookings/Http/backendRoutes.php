<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/bookings'], function (Router $router) {
    $router->bind('newbookings', function ($id) {
        return app('Modules\Bookings\Repositories\NewbookingsRepository')->find($id);
    });
    $router->get('newbookings', [
        'as' => 'admin.bookings.newbookings.index',
        'uses' => 'NewbookingsController@index',
        'middleware' => 'can:bookings.newbookings.index'
    ]);
    $router->get('newbookings/create', [
        'as' => 'admin.bookings.newbookings.create',
        'uses' => 'NewbookingsController@create',
        'middleware' => 'can:bookings.newbookings.create'
    ]);
    $router->post('newbookings', [
        'as' => 'admin.bookings.newbookings.store',
        'uses' => 'NewbookingsController@store',
        'middleware' => 'can:bookings.newbookings.create'
    ]);
      $router->post('newbookings/export_data', [
        'as' => 'admin.bookings.newbookings.export_data',
        'uses' => 'NewbookingsController@export_data',
        'middleware' => 'can:bookings.newbookings.create'
    ]);
        $router->post('newbookings/cancel', [
        'as' => 'admin.bookings.newbookings.cancel',
        'uses' => 'NewbookingsController@cancel',
        'middleware' => 'can:bookings.newbookings.create'
    ]);
    $router->get('newbookings/{newbookings}/edit', [
        'as' => 'admin.bookings.newbookings.edit',
        'uses' => 'NewbookingsController@edit',
        'middleware' => 'can:bookings.newbookings.edit'
    ]);
      $router->get('newbookings/{newbookings}/view', [
        'as' => 'admin.bookings.newbookings.view',
        'uses' => 'NewbookingsController@view',
        'middleware' => 'can:bookings.newbookings.edit'
    ]);
    $router->put('newbookings/{newbookings}', [
        'as' => 'admin.bookings.newbookings.update',
        'uses' => 'NewbookingsController@update',
        'middleware' => 'can:bookings.newbookings.edit'
    ]);
    $router->delete('newbookings/{newbookings}', [
        'as' => 'admin.bookings.newbookings.destroy',
        'uses' => 'NewbookingsController@destroy',
        'middleware' => 'can:bookings.newbookings.destroy'
    ]);
    $router->bind('accepted', function ($id) {
        return app('Modules\Bookings\Repositories\AcceptedRepository')->find($id);
    });
    $router->get('accepteds', [
        'as' => 'admin.bookings.accepted.index',
        'uses' => 'AcceptedController@index',
        'middleware' => 'can:bookings.accepteds.index'
    ]);
    $router->get('accepteds/create', [
        'as' => 'admin.bookings.accepted.create',
        'uses' => 'AcceptedController@create',
        'middleware' => 'can:bookings.accepteds.create'
    ]);
    $router->post('accepteds', [
        'as' => 'admin.bookings.accepted.store',
        'uses' => 'AcceptedController@store',
        'middleware' => 'can:bookings.accepteds.create'
    ]);
    $router->get('accepteds/{accepted}/edit', [
        'as' => 'admin.bookings.accepted.edit',
        'uses' => 'AcceptedController@edit',
        'middleware' => 'can:bookings.accepteds.edit'
    ]);
    $router->put('accepteds/{accepted}', [
        'as' => 'admin.bookings.accepted.update',
        'uses' => 'AcceptedController@update',
        'middleware' => 'can:bookings.accepteds.edit'
    ]);
    $router->delete('accepteds/{accepted}', [
        'as' => 'admin.bookings.accepted.destroy',
        'uses' => 'AcceptedController@destroy',
        'middleware' => 'can:bookings.accepteds.destroy'
    ]);
    $router->bind('pickup', function ($id) {
        return app('Modules\Bookings\Repositories\PickupRepository')->find($id);
    });
    $router->get('pickups', [
        'as' => 'admin.bookings.pickup.index',
        'uses' => 'PickupController@index',
        'middleware' => 'can:bookings.pickups.index'
    ]);
    $router->get('pickups/create', [
        'as' => 'admin.bookings.pickup.create',
        'uses' => 'PickupController@create',
        'middleware' => 'can:bookings.pickups.create'
    ]);
    $router->post('pickups', [
        'as' => 'admin.bookings.pickup.store',
        'uses' => 'PickupController@store',
        'middleware' => 'can:bookings.pickups.create'
    ]);
    $router->get('pickups/{pickup}/edit', [
        'as' => 'admin.bookings.pickup.edit',
        'uses' => 'PickupController@edit',
        'middleware' => 'can:bookings.pickups.edit'
    ]);
    $router->put('pickups/{pickup}', [
        'as' => 'admin.bookings.pickup.update',
        'uses' => 'PickupController@update',
        'middleware' => 'can:bookings.pickups.edit'
    ]);
    $router->delete('pickups/{pickup}', [
        'as' => 'admin.bookings.pickup.destroy',
        'uses' => 'PickupController@destroy',
        'middleware' => 'can:bookings.pickups.destroy'
    ]);
    $router->bind('pickupd', function ($id) {
        return app('Modules\Bookings\Repositories\PickupdRepository')->find($id);
    });
    $router->get('pickupds', [
        'as' => 'admin.bookings.pickupd.index',
        'uses' => 'PickupdController@index',
        'middleware' => 'can:bookings.pickupds.index'
    ]);
    $router->get('pickupds/create', [
        'as' => 'admin.bookings.pickupd.create',
        'uses' => 'PickupdController@create',
        'middleware' => 'can:bookings.pickupds.create'
    ]);
    $router->post('pickupds', [
        'as' => 'admin.bookings.pickupd.store',
        'uses' => 'PickupdController@store',
        'middleware' => 'can:bookings.pickupds.create'
    ]);
    $router->get('pickupds/{pickupd}/edit', [
        'as' => 'admin.bookings.pickupd.edit',
        'uses' => 'PickupdController@edit',
        'middleware' => 'can:bookings.pickupds.edit'
    ]);
    $router->put('pickupds/{pickupd}', [
        'as' => 'admin.bookings.pickupd.update',
        'uses' => 'PickupdController@update',
        'middleware' => 'can:bookings.pickupds.edit'
    ]);
    $router->delete('pickupds/{pickupd}', [
        'as' => 'admin.bookings.pickupd.destroy',
        'uses' => 'PickupdController@destroy',
        'middleware' => 'can:bookings.pickupds.destroy'
    ]);
    $router->bind('rstore', function ($id) {
        return app('Modules\Bookings\Repositories\RstoreRepository')->find($id);
    });
    $router->get('rstores', [
        'as' => 'admin.bookings.rstore.index',
        'uses' => 'RstoreController@index',
        'middleware' => 'can:bookings.rstores.index'
    ]);
    $router->get('rstores/create', [
        'as' => 'admin.bookings.rstore.create',
        'uses' => 'RstoreController@create',
        'middleware' => 'can:bookings.rstores.create'
    ]);
    $router->post('rstores', [
        'as' => 'admin.bookings.rstore.store',
        'uses' => 'RstoreController@store',
        'middleware' => 'can:bookings.rstores.create'
    ]);
    $router->get('rstores/{rstore}/edit', [
        'as' => 'admin.bookings.rstore.edit',
        'uses' => 'RstoreController@edit',
        'middleware' => 'can:bookings.rstores.edit'
    ]);
    $router->put('rstores/{rstore}', [
        'as' => 'admin.bookings.rstore.update',
        'uses' => 'RstoreController@update',
        'middleware' => 'can:bookings.rstores.edit'
    ]);
    $router->delete('rstores/{rstore}', [
        'as' => 'admin.bookings.rstore.destroy',
        'uses' => 'RstoreController@destroy',
        'middleware' => 'can:bookings.rstores.destroy'
    ]);
    $router->bind('rdel', function ($id) {
        return app('Modules\Bookings\Repositories\RdelRepository')->find($id);
    });
    $router->get('rdels', [
        'as' => 'admin.bookings.rdel.index',
        'uses' => 'RdelController@index',
        'middleware' => 'can:bookings.rdels.index'
    ]);
    $router->get('rdels/create', [
        'as' => 'admin.bookings.rdel.create',
        'uses' => 'RdelController@create',
        'middleware' => 'can:bookings.rdels.create'
    ]);
    $router->post('rdels', [
        'as' => 'admin.bookings.rdel.store',
        'uses' => 'RdelController@store',
        'middleware' => 'can:bookings.rdels.create'
    ]);
    $router->get('rdels/{rdel}/edit', [
        'as' => 'admin.bookings.rdel.edit',
        'uses' => 'RdelController@edit',
        'middleware' => 'can:bookings.rdels.edit'
    ]);
    $router->put('rdels/{rdel}', [
        'as' => 'admin.bookings.rdel.update',
        'uses' => 'RdelController@update',
        'middleware' => 'can:bookings.rdels.edit'
    ]);
    $router->delete('rdels/{rdel}', [
        'as' => 'admin.bookings.rdel.destroy',
        'uses' => 'RdelController@destroy',
        'middleware' => 'can:bookings.rdels.destroy'
    ]);
    $router->bind('delvrd', function ($id) {
        return app('Modules\Bookings\Repositories\DelvrdRepository')->find($id);
    });
    $router->get('delvrds', [
        'as' => 'admin.bookings.delvrd.index',
        'uses' => 'DelvrdController@index',
        'middleware' => 'can:bookings.delvrds.index'
    ]);
    $router->get('delvrds/create', [
        'as' => 'admin.bookings.delvrd.create',
        'uses' => 'DelvrdController@create',
        'middleware' => 'can:bookings.delvrds.create'
    ]);
    $router->post('delvrds', [
        'as' => 'admin.bookings.delvrd.store',
        'uses' => 'DelvrdController@store',
        'middleware' => 'can:bookings.delvrds.create'
    ]);
    $router->get('delvrds/{delvrd}/edit', [
        'as' => 'admin.bookings.delvrd.edit',
        'uses' => 'DelvrdController@edit',
        'middleware' => 'can:bookings.delvrds.edit'
    ]);
    $router->put('delvrds/{delvrd}', [
        'as' => 'admin.bookings.delvrd.update',
        'uses' => 'DelvrdController@update',
        'middleware' => 'can:bookings.delvrds.edit'
    ]);
    $router->delete('delvrds/{delvrd}', [
        'as' => 'admin.bookings.delvrd.destroy',
        'uses' => 'DelvrdController@destroy',
        'middleware' => 'can:bookings.delvrds.destroy'
    ]);
    $router->bind('canceled', function ($id) {
        return app('Modules\Bookings\Repositories\CanceledRepository')->find($id);
    });
    $router->get('canceleds', [
        'as' => 'admin.bookings.canceled.index',
        'uses' => 'CanceledController@index',
        'middleware' => 'can:bookings.canceleds.index'
    ]);
    $router->get('canceleds/create', [
        'as' => 'admin.bookings.canceled.create',
        'uses' => 'CanceledController@create',
        'middleware' => 'can:bookings.canceleds.create'
    ]);
    $router->post('canceleds', [
        'as' => 'admin.bookings.canceled.store',
        'uses' => 'CanceledController@store',
        'middleware' => 'can:bookings.canceleds.create'
    ]);
    $router->get('canceleds/{canceled}/edit', [
        'as' => 'admin.bookings.canceled.edit',
        'uses' => 'CanceledController@edit',
        'middleware' => 'can:bookings.canceleds.edit'
    ]);
    $router->put('canceleds/{canceled}', [
        'as' => 'admin.bookings.canceled.update',
        'uses' => 'CanceledController@update',
        'middleware' => 'can:bookings.canceleds.edit'
    ]);
    $router->delete('canceleds/{canceled}', [
        'as' => 'admin.bookings.canceled.destroy',
        'uses' => 'CanceledController@destroy',
        'middleware' => 'can:bookings.canceleds.destroy'
    ]);
// append








});
