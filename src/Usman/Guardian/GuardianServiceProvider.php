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
        
        //composers
        $this->app->view->composers([
            'Usman\Guardian\Composers\RoleOptionsComposer' => [
                'guardian::partials.user.add',
                'guardian::partials.user.edit',
                'guardian::partials.user.search-form',
                'guardian::partials.capability.add',
                'guardian::partials.capability.edit'
            ],
            'Usman\Guardian\Composers\CapabilityOptionsComposer' => [
                'guardian::partials.role.add',
                'guardian::partials.role.edit'
            ]
        ]);

        //routes
        include __DIR__.'/routes.php';
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
