<?php namespace Usman\Guardian\AccessControl;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class GuardianServiceProvider extends ServiceProvider {

	 /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->bindShared('guardian',function($app)
        {
            return new Guardian($app['auth']);
        });

        /*$this->app->booting(function() //registers a boot listener... should better go in boot().
        {
            $loader = AliasLoader::getInstance();
            $loader->alias('Guardian','Usman\Guardian\AccessControl\GuardianFacade');
        });*/ 
    }

    /**
     * Adds an alias for the GuardianFacade
     * 
     * @return void
     */
    public function boot()
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Guardian','Usman\Guardian\AccessControl\GuardianFacade');
    }
    
}