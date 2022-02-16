<?php

namespace Modules\Appusers\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Appusers\Events\Handlers\RegisterAppusersSidebar;

class AppusersServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterAppusersSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('appusers', array_dot(trans('appusers::appusers')));
            $event->load('uservehis', array_dot(trans('appusers::uservehis')));
            $event->load('wallets', array_dot(trans('appusers::wallets')));
            // append translations



        });
    }

    public function boot()
    {
        $this->publishConfig('appusers', 'permissions');

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
            'Modules\Appusers\Repositories\AppuserRepository',
            function () {
                $repository = new \Modules\Appusers\Repositories\Eloquent\EloquentAppuserRepository(new \Modules\Appusers\Entities\Appuser());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Appusers\Repositories\Cache\CacheAppuserDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Appusers\Repositories\uservehiRepository',
            function () {
                $repository = new \Modules\Appusers\Repositories\Eloquent\EloquentuservehiRepository(new \Modules\Appusers\Entities\uservehi());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Appusers\Repositories\Cache\CacheuservehiDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Appusers\Repositories\walletRepository',
            function () {
                $repository = new \Modules\Appusers\Repositories\Eloquent\EloquentwalletRepository(new \Modules\Appusers\Entities\wallet());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Appusers\Repositories\Cache\CachewalletDecorator($repository);
            }
        );
// add bindings



    }
}
