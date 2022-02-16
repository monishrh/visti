<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/coupons'], function (Router $router) {
    $router->bind('coupon', function ($id) {
        return app('Modules\Coupons\Repositories\CouponRepository')->find($id);
    });
    $router->get('coupons', [
        'as' => 'admin.coupons.coupon.index',
        'uses' => 'CouponController@index',
        'middleware' => 'can:coupons.coupons.index'
    ]);
    $router->get('coupons/create', [
        'as' => 'admin.coupons.coupon.create',
        'uses' => 'CouponController@create',
        'middleware' => 'can:coupons.coupons.create'
    ]);
    $router->post('coupons', [
        'as' => 'admin.coupons.coupon.store',
        'uses' => 'CouponController@store',
        'middleware' => 'can:coupons.coupons.create'
    ]);
    $router->get('coupons/{coupon}/edit', [
        'as' => 'admin.coupons.coupon.edit',
        'uses' => 'CouponController@edit',
        'middleware' => 'can:coupons.coupons.edit'
    ]);
    $router->put('coupons/{coupon}', [
        'as' => 'admin.coupons.coupon.update',
        'uses' => 'CouponController@update',
        'middleware' => 'can:coupons.coupons.edit'
    ]);
    $router->delete('coupons/{coupon}', [
        'as' => 'admin.coupons.coupon.destroy',
        'uses' => 'CouponController@destroy',
        'middleware' => 'can:coupons.coupons.destroy'
    ]);
// append

});
