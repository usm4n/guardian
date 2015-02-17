<?php namespace Usman\Guardian\Repositories\Providers;

use Illuminate\Support\ServiceProvider;
use Usman\Guardian\Repositories\RoleRepository;
use Usman\Guardian\Repositories\UserRepository;

class UserRepositoryServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Usman\Guardian\Repositories\Interfaces\UserRepositoryInterface',function()
        {
            $user = config('guardian.userModel');
            return new UserRepository(new $user);
        });

    }

}