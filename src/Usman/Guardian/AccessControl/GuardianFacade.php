<?php namespace Usman\Guardian\AccessControl;

use Illuminate\Support\Facades\Facade;

class GuardianFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'guardian';
    }
}