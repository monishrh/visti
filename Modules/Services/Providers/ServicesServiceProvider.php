<?php

namespace Modules\Services\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Services\Events\Handlers\RegisterServicesSidebar;

class ServicesServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterServicesSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('services', array_dot(trans('services::services')));
            $event->load('bookingnews', array_dot(trans('services::bookingnews')));
            $event->load('bookingongs', array_dot(trans('services::bookingongs')));
            $event->load('bookingcoms', array_dot(trans('services::bookingcoms')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('services', 'permissions');

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
            'Modules\Services\Repositories\ServiceRepository',
            function () {
                $repository = new \Modules\Services\Repositories\Eloquent\EloquentServiceRepository(new \Modules\Services\Entities\Service());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Services\Repositories\Cache\CacheServiceDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Services\Repositories\BookingnewRepository',
            function () {
                $repository = new \Modules\Services\Repositories\Eloquent\EloquentBookingnewRepository(new \Modules\Services\Entities\Bookingnew());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Services\Repositories\Cache\CacheBookingnewDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Services\Repositories\BookingongRepository',
            function () {
                $repository = new \Modules\Services\Repositories\Eloquent\EloquentBookingongRepository(new \Modules\Services\Entities\Bookingong());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Services\Repositories\Cache\CacheBookingongDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Services\Repositories\BookingcomRepository',
            function () {
                $repository = new \Modules\Services\Repositories\Eloquent\EloquentBookingcomRepository(new \Modules\Services\Entities\Bookingcom());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Services\Repositories\Cache\CacheBookingcomDecorator($repository);
            }
        );
// add bindings




    }
}
