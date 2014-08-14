<?php namespace Usman\Guardian\Composers;

use Usman\Guardian\Repositories\Interfaces\RoleRepositoryInterface;

class RoleOptionsComposer {

	protected $role;

	public function __construct(RoleRepositoryInterface $role)
	{
		$this->role = $role;
	}

	public function compose($view)
	{
		$view->roles = $this->role->getAll(['id','role_name']);
	}
}