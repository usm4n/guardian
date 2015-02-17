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
     * Bootstrap the package.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadAndPublishViews();
        $this->publishAssets();
        $this->publishConfig();
        $this->publishMigrations();

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
        $this->mergeConfiguration();

        //register other providers
        $this->app->register('Usman\Guardian\Repositories\Providers\UserRepositoryServiceProvider');
        $this->app->register('Usman\Guardian\Repositories\Providers\RoleRepositoryServiceProvider');
        $this->app->register('Usman\Guardian\Repositories\Providers\CapabilityRepositoryServiceProvider');
        $this->app->register('Usman\Guardian\AccessControl\GuardianServiceProvider');
        $this->app->register('Usman\Guardian\Composers\ComposersServiceProvider');
    }

    /**
     * loads and publishes the package view files
     * 
     * @return void
     */
    private function loadAndPublishViews()
    {
        $viewPath = __DIR__.'/../../views';
        $this->loadViewsFrom($viewPath, 'guardian');
        
        $this->publishes([
            $viewPath => base_path('resources/views/vendor/guardian'),
        ],'guardian-views');
    }

    /**
     * publishes the package assets
     * 
     * @return void
     */
    private function publishAssets()
    {
        $assetPath = __DIR__.'/../../../public';
        $this->publishes([
            $assetPath => public_path('packages/usm4n/guardian'),
        ], 'guardian-assets');
    }

    /**
     * publishes the package config file
     * 
     * @return void
     */
    private function publishConfig()
    {
        $configPath = __DIR__.'/../../config/config.php';
        $this->publishes([$configPath => config_path('guardian.php')], 'guardian-config');
    }

    /**
     * publishes the package migration files
     * 
     * @return void
     */
    private function publishMigrations()
    {
        $migrationPath = __DIR__.'/../../migrations';
        $this->publishes([$migrationPath => base_path('database/migrations')], 'guardian-migrations');
    }

    /**
     * merges the package config with the app config
     * 
     * @return void
     */
    private function mergeConfiguration()
    {
        $configPath = __DIR__.'/../../config/config.php';
        $this->mergeConfigFrom($configPath, 'guardian');

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
