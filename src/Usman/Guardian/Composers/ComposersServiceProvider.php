<?php namespace Usman\Guardian\Composers;

use Illuminate\Support\ServiceProvider;

class ComposersServiceProvider extends ServiceProvider {

    /**
     * Registers the view composers after the application is booted.
     *
     * @return void
     */
    public function boot()
    {
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
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
