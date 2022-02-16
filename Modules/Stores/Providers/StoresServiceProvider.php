<?php

namespace Modules\Stores\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Stores\Events\Handlers\RegisterStoresSidebar;

class StoresServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterStoresSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('stores', array_dot(trans('stores::stores')));
            $event->load('reviews', array_dot(trans('stores::reviews')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('stores', 'permissions');

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
            'Modules\Stores\Repositories\StoresRepository',
            function () {
                $repository = new \Modules\Stores\Repositories\Eloquent\EloquentStoresRepository(new \Modules\Stores\Entities\Stores());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Stores\Repositories\Cache\CacheStoresDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Stores\Repositories\reviewsRepository',
            function () {
                $repository = new \Modules\Stores\Repositories\Eloquent\EloquentreviewsRepository(new \Modules\Stores\Entities\reviews());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Stores\Repositories\Cache\CachereviewsDecorator($repository);
            }
        );
// add bindings


    }
}
