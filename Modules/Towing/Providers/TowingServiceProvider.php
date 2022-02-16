<?php

namespace Modules\Towing\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Towing\Events\Handlers\RegisterTowingSidebar;

class TowingServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterTowingSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('towingts', array_dot(trans('towing::towingts')));
            $event->load('tnews', array_dot(trans('towing::tnews')));
            $event->load('tongs', array_dot(trans('towing::tongs')));
            $event->load('tcoms', array_dot(trans('towing::tcoms')));
            $event->load('tcans', array_dot(trans('towing::tcans')));
            $event->load('tvendors', array_dot(trans('towing::tvendors')));
            // append translations






        });
    }

    public function boot()
    {
        $this->publishConfig('towing', 'permissions');

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
            'Modules\Towing\Repositories\TowingtRepository',
            function () {
                $repository = new \Modules\Towing\Repositories\Eloquent\EloquentTowingtRepository(new \Modules\Towing\Entities\Towingt());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Towing\Repositories\Cache\CacheTowingtDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Towing\Repositories\TnewRepository',
            function () {
                $repository = new \Modules\Towing\Repositories\Eloquent\EloquentTnewRepository(new \Modules\Towing\Entities\Tnew());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Towing\Repositories\Cache\CacheTnewDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Towing\Repositories\TongRepository',
            function () {
                $repository = new \Modules\Towing\Repositories\Eloquent\EloquentTongRepository(new \Modules\Towing\Entities\Tong());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Towing\Repositories\Cache\CacheTongDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Towing\Repositories\TcomRepository',
            function () {
                $repository = new \Modules\Towing\Repositories\Eloquent\EloquentTcomRepository(new \Modules\Towing\Entities\Tcom());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Towing\Repositories\Cache\CacheTcomDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Towing\Repositories\TcanRepository',
            function () {
                $repository = new \Modules\Towing\Repositories\Eloquent\EloquentTcanRepository(new \Modules\Towing\Entities\Tcan());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Towing\Repositories\Cache\CacheTcanDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Towing\Repositories\tvendorsRepository',
            function () {
                $repository = new \Modules\Towing\Repositories\Eloquent\EloquenttvendorsRepository(new \Modules\Towing\Entities\tvendors());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Towing\Repositories\Cache\CachetvendorsDecorator($repository);
            }
        );
// add bindings






    }
}
