<?php namespace Usman\Guardian\Composers;

use Usman\Guardian\Repositories\Interfaces\RoleRepositoryInterface as RoleRepository;

class RoleOptionsComposer {

	/**
	 * The role repository implementation.
	 * 
	 * @var RoleRepository
	 */
    protected $role;

    /**
     * Creates a new instance of RoleOptionsComposer.
     * 
     * @param RoleRepositoryInterface $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * Binds the role options to the view
     * 
     * @param  View $view
     * @return void
     */
    public function compose($view)
    {
        $view->roles = $this->role->getAll(['id','role_name']);
    }
}