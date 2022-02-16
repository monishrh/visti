<?php

namespace Modules\Coupons\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Coupons\Events\Handlers\RegisterCouponsSidebar;

class CouponsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterCouponsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('coupons', array_dot(trans('coupons::coupons')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('coupons', 'permissions');

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
            'Modules\Coupons\Repositories\CouponRepository',
            function () {
                $repository = new \Modules\Coupons\Repositories\Eloquent\EloquentCouponRepository(new \Modules\Coupons\Entities\Coupon());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Coupons\Repositories\Cache\CacheCouponDecorator($repository);
            }
        );
// add bindings

    }
}
