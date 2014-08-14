<?php namespace Usman\Guardian\Composers;

use Usman\Guardian\Repositories\Interfaces\CapabilityRepositoryInterface;

class CapabilityOptionsComposer {

	protected $capability;

	public function __construct(CapabilityRepositoryInterface $capability)
	{
		$this->capability = $capability;
	}

	public function compose($view)
	{
		$view->capabilities = $this->capability->getAll(['id','capability']);
	}
}