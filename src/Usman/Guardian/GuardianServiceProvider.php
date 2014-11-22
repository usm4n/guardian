<?php namespace Usman\Guardian;

use Illuminate\Support\ServiceProvider;

class GuardianServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('usm4n/guardian');

        //routes
        include __DIR__.'/Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Usman\Guardian\Repositories\Providers\UserRepositoryServiceProvider');
        $this->app->register('Usman\Guardian\Repositories\Providers\RoleRepositoryServiceProvider');
        $this->app->register('Usman\Guardian\Repositories\Providers\CapabilityRepositoryServiceProvider');
        $this->app->register('Usman\Guardian\AccessControl\GuardianServiceProvider');
        $this->app->register('Usman\Guardian\Composers\ComposersServiceProvider');
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

}
