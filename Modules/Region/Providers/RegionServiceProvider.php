<?php

namespace Modules\Region\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Region\Events\Handlers\RegisterRegionSidebar;

class RegionServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterRegionSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('cities', array_dot(trans('region::cities')));
            $event->load('areas', array_dot(trans('region::areas')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('region', 'permissions');

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
            'Modules\Region\Repositories\CityRepository',
            function () {
                $repository = new \Modules\Region\Repositories\Eloquent\EloquentCityRepository(new \Modules\Region\Entities\City());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Region\Repositories\Cache\CacheCityDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Region\Repositories\AreaRepository',
            function () {
                $repository = new \Modules\Region\Repositories\Eloquent\EloquentAreaRepository(new \Modules\Region\Entities\Area());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Region\Repositories\Cache\CacheAreaDecorator($repository);
            }
        );
// add bindings


    }
}
