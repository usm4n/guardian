<?php namespace Usman\Guardian\AccessControl;

use Illuminate\Auth\AuthManager;

class Guardian {

    /**
     * The current logged in user
     * 
     * @var User
     */
    protected $user;

    /**
     * The auth driver manager instance
     * 
     * @var Illuminate\Auth\AuthManager
     */
    protected $auth;

    /**
     * @var boolean
     */
    protected $loggedIn;

    /**
     * Creates an instance of Guardian
     * 
     * @param Illuminate\Auth\AuthManager $auth
     */
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
        $this->init();
    }

    /**
     * Checks for a role
     * 
     * @param  string  $roleName
     * @return boolean
     */
    public function hasRole($role)
    {
        if( ! $this->loggedIn) return false;
        
        return $this->user->hasRole($role);
    }

    /**
     * Checks for any role
     * 
     * @param  array   $roleNames
     * @return boolean
     */
    public function hasAnyRole(array $roleNames)
    {
        if( ! $this->loggedIn) return false;

        return $this->user->hasAnyRole($roleNames);
    }

    /**
     * Checks for all roles
     * 
     * @param  array   $roleNames
     * @return boolean
     */
    public function hasAllRoles(array $roleNames)
    {
        if ( ! $this->loggedIn) return false;

        return $this->user->hasAllRoles($roleNames);
    }

    /**
     * Checks if a user has a capability
     * 
     * @param  string  $capabilityName
     * @return boolean
     */
    public function hasCapability($capability)
    {
        if( ! $this->loggedIn) return false;

        return $this->user->hasCapability($capability);

    }

    /**
     * Checks if a user has any capability
     * 
     * @param  array   $capabilityNames
     * @return boolean
     */
    public function hasAnyCapability(array $capabilityNames)
    {
        if( ! $this->loggedIn) return false;

        return $this->user->hasAnyCapability($capabilityNames);
    }

    /**
     * Checks if a user has all the capabilities
     * 
     * @param  array   $capabilityNames
     * @return boolean
     */
    public function hasAllCapabilities(array $capabilityNames)
    {
        if( ! $this->loggedIn) return false;

        return $this->user->hasAllCapabilities($capabilityNames);
    }

    /**
     * Initializes the Guardian instance.
     * 
     * @return void
     */
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