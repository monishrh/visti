<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/towing'], function (Router $router) {
    $router->bind('towingt', function ($id) {
        return app('Modules\Towing\Repositories\TowingtRepository')->find($id);
    });
    $router->get('towingts', [
        'as' => 'admin.towing.towingt.index',
        'uses' => 'TowingtController@index',
        'middleware' => 'can:towing.towingts.index'
    ]);
    $router->get('towingts/create', [
        'as' => 'admin.towing.towingt.create',
        'uses' => 'TowingtController@create',
        'middleware' => 'can:towing.towingts.create'
    ]);
    $router->post('towingts', [
        'as' => 'admin.towing.towingt.store',
        'uses' => 'TowingtController@store',
        'middleware' => 'can:towing.towingts.create'
    ]);

    $router->get('towingts/{towingt}/edit', [
        'as' => 'admin.towing.towingt.edit',
        'uses' => 'TowingtController@edit',
        'middleware' => 'can:towing.towingts.edit'
    ]);
    $router->put('towingts/{towingt}', [
        'as' => 'admin.towing.towingt.update',
        'uses' => 'TowingtController@update',
        'middleware' => 'can:towing.towingts.edit'
    ]);
    $router->delete('towingts/{towingt}', [
        'as' => 'admin.towing.towingt.destroy',
        'uses' => 'TowingtController@destroy',
        'middleware' => 'can:towing.towingts.destroy'
    ]);
    $router->bind('tnew', function ($id) {
        return app('Modules\Towing\Repositories\TnewRepository')->find($id);
    });
    $router->get('tnews', [
        'as' => 'admin.towing.tnew.index',
        'uses' => 'TnewController@index',
        'middleware' => 'can:towing.tnews.index'
    ]);
    $router->get('tnews/create', [
        'as' => 'admin.towing.tnew.create',
        'uses' => 'TnewController@create',
        'middleware' => 'can:towing.tnews.create'
    ]);
     $router->post('tnews/cancel', [
        'as' => 'admin.towing.tnew.cancel',
        'uses' => 'TnewController@cancel',
        'middleware' => 'can:towing.tnews.create'
    ]);
       $router->post('tnews/change', [
        'as' => 'admin.towing.tnew.change',
        'uses' => 'TnewController@change',
        'middleware' => 'can:towing.tnews.create'
    ]);
    $router->post('tnews', [
        'as' => 'admin.towing.tnew.store',
        'uses' => 'TnewController@store',
        'middleware' => 'can:towing.tnews.create'
    ]);
    $router->get('tnews/{tnew}/edit', [
        'as' => 'admin.towing.tnew.edit',
        'uses' => 'TnewController@edit',
        'middleware' => 'can:towing.tnews.edit'
    ]);

    $router->put('tnews/{tnew}', [
        'as' => 'admin.towing.tnew.update',
        'uses' => 'TnewController@update',
        'middleware' => 'can:towing.tnews.edit'
    ]);
    $router->delete('tnews/{tnew}', [
        'as' => 'admin.towing.tnew.destroy',
        'uses' => 'TnewController@destroy',
        'middleware' => 'can:towing.tnews.destroy'
    ]);
    $router->bind('tong', function ($id) {
        return app('Modules\Towing\Repositories\TongRepository')->find($id);
    });
    $router->get('tongs', [
        'as' => 'admin.towing.tong.index',
        'uses' => 'TongController@index',
        'middleware' => 'can:towing.tongs.index'
    ]);
    $router->get('tongs/create', [
        'as' => 'admin.towing.tong.create',
        'uses' => 'TongController@create',
        'middleware' => 'can:towing.tongs.create'
    ]);
    $router->post('tongs', [
        'as' => 'admin.towing.tong.store',
        'uses' => 'TongController@store',
        'middleware' => 'can:towing.tongs.create'
    ]);
    $router->get('tongs/{tong}/edit', [
        'as' => 'admin.towing.tong.edit',
        'uses' => 'TongController@edit',
        'middleware' => 'can:towing.tongs.edit'
    ]);
    $router->put('tongs/{tong}', [
        'as' => 'admin.towing.tong.update',
        'uses' => 'TongController@update',
        'middleware' => 'can:towing.tongs.edit'
    ]);
    $router->delete('tongs/{tong}', [
        'as' => 'admin.towing.tong.destroy',
        'uses' => 'TongController@destroy',
        'middleware' => 'can:towing.tongs.destroy'
    ]);
    $router->bind('tcom', function ($id) {
        return app('Modules\Towing\Repositories\TcomRepository')->find($id);
    });
    $router->get('tcoms', [
        'as' => 'admin.towing.tcom.index',
        'uses' => 'TcomController@index',
        'middleware' => 'can:towing.tcoms.index'
    ]);
    $router->get('tcoms/create', [
        'as' => 'admin.towing.tcom.create',
        'uses' => 'TcomController@create',
        'middleware' => 'can:towing.tcoms.create'
    ]);
    $router->post('tcoms', [
        'as' => 'admin.towing.tcom.store',
        'uses' => 'TcomController@store',
        'middleware' => 'can:towing.tcoms.create'
    ]);
    $router->get('tcoms/{tcom}/edit', [
        'as' => 'admin.towing.tcom.edit',
        'uses' => 'TcomController@edit',
        'middleware' => 'can:towing.tcoms.edit'
    ]);
    $router->put('tcoms/{tcom}', [
        'as' => 'admin.towing.tcom.update',
        'uses' => 'TcomController@update',
        'middleware' => 'can:towing.tcoms.edit'
    ]);
    $router->delete('tcoms/{tcom}', [
        'as' => 'admin.towing.tcom.destroy',
        'uses' => 'TcomController@destroy',
        'middleware' => 'can:towing.tcoms.destroy'
    ]);
    $router->bind('tcan', function ($id) {
        return app('Modules\Towing\Repositories\TcanRepository')->find($id);
    });
    $router->get('tcans', [
        'as' => 'admin.towing.tcan.index',
        'uses' => 'TcanController@index',
        'middleware' => 'can:towing.tcans.index'
    ]);
    $router->get('tcans/create', [
        'as' => 'admin.towing.tcan.create',
        'uses' => 'TcanController@create',
        'middleware' => 'can:towing.tcans.create'
    ]);
    $router->post('tcans', [
        'as' => 'admin.towing.tcan.store',
        'uses' => 'TcanController@store',
        'middleware' => 'can:towing.tcans.create'
    ]);
    $router->get('tcans/{tcan}/edit', [
        'as' => 'admin.towing.tcan.edit',
        'uses' => 'TcanController@edit',
        'middleware' => 'can:towing.tcans.edit'
    ]);
    $router->put('tcans/{tcan}', [
        'as' => 'admin.towing.tcan.update',
        'uses' => 'TcanController@update',
        'middleware' => 'can:towing.tcans.edit'
    ]);
    $router->delete('tcans/{tcan}', [
        'as' => 'admin.towing.tcan.destroy',
        'uses' => 'TcanController@destroy',
        'middleware' => 'can:towing.tcans.destroy'
    ]);
    $router->bind('tvendors', function ($id) {
        return app('Modules\Towing\Repositories\tvendorsRepository')->find($id);
    });
    $router->get('tvendors', [
        'as' => 'admin.towing.tvendors.index',
        'uses' => 'tvendorsController@index',
        'middleware' => 'can:towing.tvendors.index'
    ]);
    $router->get('tvendors/create', [
        'as' => 'admin.towing.tvendors.create',
        'uses' => 'tvendorsController@create',
        'middleware' => 'can:towing.tvendors.create'
    ]);
    $router->post('tvendors', [
        'as' => 'admin.towing.tvendors.store',
        'uses' => 'tvendorsController@store',
        'middleware' => 'can:towing.tvendors.create'
    ]);
    $router->get('tvendors/{tvendors}/edit', [
        'as' => 'admin.towing.tvendors.edit',
        'uses' => 'tvendorsController@edit',
        'middleware' => 'can:towing.tvendors.edit'
    ]);
    $router->put('tvendors/{tvendors}', [
        'as' => 'admin.towing.tvendors.update',
        'uses' => 'tvendorsController@update',
        'middleware' => 'can:towing.tvendors.edit'
    ]);
    $router->delete('tvendors/{tvendors}', [
        'as' => 'admin.towing.tvendors.destroy',
        'uses' => 'tvendorsController@destroy',
        'middleware' => 'can:towing.tvendors.destroy'
    ]);
// append






});
