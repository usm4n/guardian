<?php namespace Usman\Guardian\Http\Controllers;

class Base extends \Controller {

    /**
     * Master layout to be used for all the views.
     * 
     * @var string
     */
    protected $layout;

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = \View::make($this->layout);
        }
    }

}
