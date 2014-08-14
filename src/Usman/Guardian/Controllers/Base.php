<?php namespace Usman\Guardian\Controllers;

class Base extends \Controller {

    protected $layout = 'guardian::layout.master';

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
