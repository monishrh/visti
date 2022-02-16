<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/appusers'], function (Router $router) {
    $router->bind('appuser', function ($id) {
        return app('Modules\Appusers\Repositories\AppuserRepository')->find($id);
    });
    $router->get('appusers', [
        'as' => 'admin.appusers.appuser.index',
        'uses' => 'AppuserController@index',
        'middleware' => 'can:appusers.appusers.index'
    ]);
    $router->get('appusers/create', [
        'as' => 'admin.appusers.appuser.create',
        'uses' => 'AppuserController@create',
        'middleware' => 'can:appusers.appusers.create'
    ]);
    $router->post('appusers', [
        'as' => 'admin.appusers.appuser.store',
        'uses' => 'AppuserController@store',
        'middleware' => 'can:appusers.appusers.create'
    ]);
      $router->get('appusers/export_data', [
        'as' => 'admin.appusers.appuser.export_data',
        'uses' => 'AppuserController@export_data',
        'middleware' => 'can:appusers.appusers.create'
    ]);

    $router->get('appusers/{appuser}/edit', [
        'as' => 'admin.appusers.appuser.edit',
        'uses' => 'AppuserController@edit',
        'middleware' => 'can:appusers.appusers.edit'
    ]);
    $router->put('appusers/{appuser}', [
        'as' => 'admin.appusers.appuser.update',
        'uses' => 'AppuserController@update',
        'middleware' => 'can:appusers.appusers.edit'
    ]);
    $router->delete('appusers/{appuser}', [
        'as' => 'admin.appusers.appuser.destroy',
        'uses' => 'AppuserController@destroy',
        'middleware' => 'can:appusers.appusers.destroy'
    ]);
    $router->bind('uservehi', function ($id) {
        return app('Modules\Appusers\Repositories\uservehiRepository')->find($id);
    });
    $router->get('uservehis', [
        'as' => 'admin.appusers.uservehi.index',
        'uses' => 'uservehiController@index',
        'middleware' => 'can:appusers.uservehis.index'
    ]);
    $router->get('uservehis/create', [
        'as' => 'admin.appusers.uservehi.create',
        'uses' => 'uservehiController@create',
        'middleware' => 'can:appusers.uservehis.create'
    ]);
    $router->post('uservehis', [
        'as' => 'admin.appusers.uservehi.store',
        'uses' => 'uservehiController@store',
        'middleware' => 'can:appusers.uservehis.create'
    ]);
    $router->get('uservehis/{uservehi}/edit', [
        'as' => 'admin.appusers.uservehi.edit',
        'uses' => 'uservehiController@edit',
        'middleware' => 'can:appusers.uservehis.edit'
    ]);
    $router->put('uservehis/{uservehi}', [
        'as' => 'admin.appusers.uservehi.update',
        'uses' => 'uservehiController@update',
        'middleware' => 'can:appusers.uservehis.edit'
    ]);
    $router->delete('uservehis/{uservehi}', [
        'as' => 'admin.appusers.uservehi.destroy',
        'uses' => 'uservehiController@destroy',
        'middleware' => 'can:appusers.uservehis.destroy'
    ]);
    $router->bind('wallet', function ($id) {
        return app('Modules\Appusers\Repositories\walletRepository')->find($id);
    });
    $router->get('wallets', [
        'as' => 'admin.appusers.wallet.index',
        'uses' => 'walletController@index',
        'middleware' => 'can:appusers.wallets.index'
    ]);
    $router->get('wallets/create', [
        'as' => 'admin.appusers.wallet.create',
        'uses' => 'walletController@create',
        'middleware' => 'can:appusers.wallets.create'
    ]);
    $router->post('wallets', [
        'as' => 'admin.appusers.wallet.store',
        'uses' => 'walletController@store',
        'middleware' => 'can:appusers.wallets.create'
    ]);
    $router->get('wallets/{wallet}/edit', [
        'as' => 'admin.appusers.wallet.edit',
        'uses' => 'walletController@edit',
        'middleware' => 'can:appusers.wallets.edit'
    ]);
    $router->put('wallets/{wallet}', [
        'as' => 'admin.appusers.wallet.update',
        'uses' => 'walletController@update',
        'middleware' => 'can:appusers.wallets.edit'
    ]);
    $router->delete('wallets/{wallet}', [
        'as' => 'admin.appusers.wallet.destroy',
        'uses' => 'walletController@destroy',
        'middleware' => 'can:appusers.wallets.destroy'
    ]);
// append



});
