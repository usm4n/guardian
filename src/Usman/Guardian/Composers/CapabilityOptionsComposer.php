<?php namespace Usman\Guardian\Composers;

use Usman\Guardian\Repositories\Interfaces\CapabilityRepositoryInterface as CapabilityRepository;

class CapabilityOptionsComposer {

	/**
	 * The capbility repository implementation.
	 * 
	 * @var CapabilityRepository
	 */
    protected $capability;

    /**
     * Creates a new instance of CapabilityOptionsComposer
     * 
     * @param CapabilityRepository $capability
     */
    public function __construct(CapabilityRepository $capability)
    {
        $this->capability = $capability;
    }

    /**
     * Binds the capability options data to the view.
     * 
     * @param  View $view
     * @return void
     */
    public function compose($view)
    {
        $view->capabilities = $this->capability->getAll(['id','capability']);
    }
}