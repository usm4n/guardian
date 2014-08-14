<?php namespace Usman\Guardian\Repositories\Providers;

use Illuminate\Support\ServiceProvider;
use Usman\Guardian\Repositories\CapabilityRepository;

class CapabilityRepositoryServiceProvider extends ServiceProvider {

	 /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Usman\Guardian\Repositories\Interfaces\CapabilityRepositoryInterface',function()
        {
            $capability = \Config::get('guardian::capabilityModel');
            return new CapabilityRepository(new $capability);
        });
    }
}