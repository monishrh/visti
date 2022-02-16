<?php

namespace Modules\Bikers\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Bikers\Events\Handlers\RegisterBikersSidebar;

class BikersServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterBikersSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('bikers', array_dot(trans('bikers::bikers')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('bikers', 'permissions');

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
            'Modules\Bikers\Repositories\BikerRepository',
            function () {
                $repository = new \Modules\Bikers\Repositories\Eloquent\EloquentBikerRepository(new \Modules\Bikers\Entities\Biker());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bikers\Repositories\Cache\CacheBikerDecorator($repository);
            }
        );
// add bindings

    }
}
