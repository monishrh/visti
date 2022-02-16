<?php

namespace Modules\Vehiclem\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Vehiclem\Events\Handlers\RegisterVehiclemSidebar;

class VehiclemServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterVehiclemSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('brands', array_dot(trans('vehiclem::brands')));
            $event->load('bmodels', array_dot(trans('vehiclem::bmodels')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('vehiclem', 'permissions');

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
            'Modules\Vehiclem\Repositories\BrandRepository',
            function () {
                $repository = new \Modules\Vehiclem\Repositories\Eloquent\EloquentBrandRepository(new \Modules\Vehiclem\Entities\Brand());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Vehiclem\Repositories\Cache\CacheBrandDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Vehiclem\Repositories\BmodelRepository',
            function () {
                $repository = new \Modules\Vehiclem\Repositories\Eloquent\EloquentBmodelRepository(new \Modules\Vehiclem\Entities\Bmodel());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Vehiclem\Repositories\Cache\CacheBmodelDecorator($repository);
            }
        );
// add bindings


    }
}
