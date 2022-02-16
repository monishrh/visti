<?php

namespace Modules\Bookings\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Bookings\Events\Handlers\RegisterBookingsSidebar;

class BookingsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterBookingsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('newbookings', array_dot(trans('bookings::newbookings')));
            $event->load('accepteds', array_dot(trans('bookings::accepteds')));
            $event->load('pickups', array_dot(trans('bookings::pickups')));
            $event->load('pickupds', array_dot(trans('bookings::pickupds')));
            $event->load('rstores', array_dot(trans('bookings::rstores')));
            $event->load('rdels', array_dot(trans('bookings::rdels')));
            $event->load('delvrds', array_dot(trans('bookings::delvrds')));
            $event->load('canceleds', array_dot(trans('bookings::canceleds')));
            // append translations








        });
    }

    public function boot()
    {
        $this->publishConfig('bookings', 'permissions');

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
            'Modules\Bookings\Repositories\NewbookingsRepository',
            function () {
                $repository = new \Modules\Bookings\Repositories\Eloquent\EloquentNewbookingsRepository(new \Modules\Bookings\Entities\Newbookings());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bookings\Repositories\Cache\CacheNewbookingsDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Bookings\Repositories\AcceptedRepository',
            function () {
                $repository = new \Modules\Bookings\Repositories\Eloquent\EloquentAcceptedRepository(new \Modules\Bookings\Entities\Accepted());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bookings\Repositories\Cache\CacheAcceptedDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Bookings\Repositories\PickupRepository',
            function () {
                $repository = new \Modules\Bookings\Repositories\Eloquent\EloquentPickupRepository(new \Modules\Bookings\Entities\Pickup());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bookings\Repositories\Cache\CachePickupDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Bookings\Repositories\PickupdRepository',
            function () {
                $repository = new \Modules\Bookings\Repositories\Eloquent\EloquentPickupdRepository(new \Modules\Bookings\Entities\Pickupd());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bookings\Repositories\Cache\CachePickupdDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Bookings\Repositories\RstoreRepository',
            function () {
                $repository = new \Modules\Bookings\Repositories\Eloquent\EloquentRstoreRepository(new \Modules\Bookings\Entities\Rstore());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bookings\Repositories\Cache\CacheRstoreDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Bookings\Repositories\RdelRepository',
            function () {
                $repository = new \Modules\Bookings\Repositories\Eloquent\EloquentRdelRepository(new \Modules\Bookings\Entities\Rdel());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bookings\Repositories\Cache\CacheRdelDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Bookings\Repositories\DelvrdRepository',
            function () {
                $repository = new \Modules\Bookings\Repositories\Eloquent\EloquentDelvrdRepository(new \Modules\Bookings\Entities\Delvrd());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bookings\Repositories\Cache\CacheDelvrdDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Bookings\Repositories\CanceledRepository',
            function () {
                $repository = new \Modules\Bookings\Repositories\Eloquent\EloquentCanceledRepository(new \Modules\Bookings\Entities\Canceled());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Bookings\Repositories\Cache\CacheCanceledDecorator($repository);
            }
        );
// add bindings








    }
}
