<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/worktimings'], function (Router $router) {
    $router->bind('timing', function ($id) {
        return app('Modules\Worktimings\Repositories\TimingRepository')->find($id);
    });
    $router->get('timings', [
        'as' => 'admin.worktimings.timing.index',
        'uses' => 'TimingController@index',
        'middleware' => 'can:worktimings.timings.index'
    ]);
    $router->get('timings/create', [
        'as' => 'admin.worktimings.timing.create',
        'uses' => 'TimingController@create',
        'middleware' => 'can:worktimings.timings.create'
    ]);
    $router->post('timings', [
        'as' => 'admin.worktimings.timing.store',
        'uses' => 'TimingController@store',
        'middleware' => 'can:worktimings.timings.create'
    ]);
    $router->get('timings/{timing}/edit', [
        'as' => 'admin.worktimings.timing.edit',
        'uses' => 'TimingController@edit',
        'middleware' => 'can:worktimings.timings.edit'
    ]);
    $router->put('timings/{timing}', [
        'as' => 'admin.worktimings.timing.update',
        'uses' => 'TimingController@update',
        'middleware' => 'can:worktimings.timings.edit'
    ]);
    $router->delete('timings/{timing}', [
        'as' => 'admin.worktimings.timing.destroy',
        'uses' => 'TimingController@destroy',
        'middleware' => 'can:worktimings.timings.destroy'
    ]);
// append

});
