<?php

namespace Modules\Insurance\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Insurance\Events\Handlers\RegisterInsuranceSidebar;

class InsuranceServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterInsuranceSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('newis', array_dot(trans('insurance::newis')));
            $event->load('onis', array_dot(trans('insurance::onis')));
            $event->load('comis', array_dot(trans('insurance::comis')));
            $event->load('canis', array_dot(trans('insurance::canis')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('insurance', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Insurance\Repositories\NewiRepository',
            function () {
                $repository = new \Modules\Insurance\Repositories\Eloquent\EloquentNewiRepository(new \Modules\Insurance\Entities\Newi());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Insurance\Repositories\Cache\CacheNewiDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Insurance\Repositories\OniRepository',
            function () {
                $repository = new \Modules\Insurance\Repositories\Eloquent\EloquentOniRepository(new \Modules\Insurance\Entities\Oni());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Insurance\Repositories\Cache\CacheOniDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Insurance\Repositories\ComiRepository',
            function () {
                $repository = new \Modules\Insurance\Repositories\Eloquent\EloquentComiRepository(new \Modules\Insurance\Entities\Comi());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Insurance\Repositories\Cache\CacheComiDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Insurance\Repositories\CaniRepository',
            function () {
                $repository = new \Modules\Insurance\Repositories\Eloquent\EloquentCaniRepository(new \Modules\Insurance\Entities\Cani());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Insurance\Repositories\Cache\CacheCaniDecorator($repository);
            }
        );
// add bindings




    }
}
