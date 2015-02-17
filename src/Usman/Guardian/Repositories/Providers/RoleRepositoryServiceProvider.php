<?php namespace Usman\Guardian\Repositories\Providers;


use Illuminate\Support\ServiceProvider;
use Usman\Guardian\Repositories\RoleRepository;

class RoleRepositoryServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Usman\Guardian\Repositories\Interfaces\RoleRepositoryInterface',function()
        {
            $role = config('guardian.roleModel');
            return new RoleRepository(new $role);
        });
    }
}