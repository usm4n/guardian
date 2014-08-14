<?php namespace Usman\Guardian\AccessControl;

use Illuminate\Auth\AuthManager;

class Guardian {

	protected $user;

	protected $auth;

	protected $loggedIn;

	public function __construct(AuthManager $auth)
	{
		$this->auth = $auth;
		$this->init();
	}

	public function hasRole($role)
	{
		if( ! $this->loggedIn) return false;
		
		return $this->user->hasRole($role);
	}

	public function hasAnyRole(array $roleNames)
	{
		if( ! $this->loggedIn) return false;

		return $this->user->hasAnyRole($roleNames);
	}

	public function hasAllRoles(array $roleNames)
	{
		if ( ! $this->loggedIn) return false;

		return $this->user->hasAllRoles($roleNames);
	}

	public function hasCapability($capability)
	{
		if( ! $this->loggedIn) return false;

		return $this->user->hasCapability($capability);

	}

	public function hasAnyCapability(array $capabilityNames)
	{
		if( ! $this->loggedIn) return false;

		return $this->user->hasAnyCapability($capabilityNames);
	}

	public function hasAllCapabilities(array $capabilityNames)
	{
		if( ! $this->loggedIn) return false;

		return $this->user->hasAllCapabilities($capabilityNames);
	}

	protected function init()
	{
		$user = $this->auth->user();
		
		if(is_null($user))
		{
			return $this->loggedIn = false;
		}
		else
		{
			if( ! ($user instanceof AccessControlInterface))
			{
				throw new InvalidUserInstanceException('User Model Should Implement Usman\Guardian\AccessControl\AccessControlInterface');
			}
			
			$this->user = $user;
			$this->loggedIn = true;
		}

	}

}