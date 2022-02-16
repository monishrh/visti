<?php

namespace Modules\Worktimings\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Worktimings\Events\Handlers\RegisterWorktimingsSidebar;

class WorktimingsServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterWorktimingsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('timings', array_dot(trans('worktimings::timings')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('worktimings', 'permissions');

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
            'Modules\Worktimings\Repositories\TimingRepository',
            function () {
                $repository = new \Modules\Worktimings\Repositories\Eloquent\EloquentTimingRepository(new \Modules\Worktimings\Entities\Timing());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Worktimings\Repositories\Cache\CacheTimingDecorator($repository);
            }
        );
// add bindings

    }
}
