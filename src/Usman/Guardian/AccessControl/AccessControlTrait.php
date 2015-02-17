<?php namespace Usman\Guardian\AccessControl;

trait AccessControlTrait {

    /**
     * Defines a one to many relation with the roles table
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('guardian.roleModel'));
    }
    
    /**
     * Checks for a role
     * 
     * @param  string  $roleName
     * @return boolean
     */
    public function hasRole($roleName)
    {
        foreach($this->roles as $role)
        {
            if(strtolower($role->role_name) == strtolower($roleName))
            {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks for any role
     * 
     * @param  array   $roleNames
     * @return boolean
     */
    public function hasAnyRole(array $roleNames)
    {
        foreach($roleNames as $roleName)
        {
            if($this->hasRole($roleName)) return true;
        }
        return false;
    }

    /**
     * Checks for all roles
     * 
     * @param  array   $roleNames
     * @return boolean
     */
    public function hasAllRoles(array $roleNames)
    {
        foreach($roleNames as $roleName)
        {
            if( ! $this->hasRole($roleName)) return false;
        }
        return true;
    }

    /**
     * Checks if a user has a capability
     * 
     * @param  string  $capabilityName
     * @return boolean
     */
    public function hasCapability($capabilityName)
    {
        foreach($this->roles as $role)
        {
            foreach($role->capabilities as $capability)
            { 
                if(strtolower($capability->capability) == strtolower($capabilityName))
                {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Checks if a user has any capability
     * 
     * @param  array   $capabilityNames
     * @return boolean
     */
    public function hasAnyCapability(array $capabilityNames)
    {
        foreach($capabilityNames as $capabilityName)
        {
            if($this->hasCapability($capabilityName)) return true;
        }
        return false;

    }

    /**
     * Checks if a user has all the capabilities
     * 
     * @param  array   $capabilityNames
     * @return boolean
     */
    public function hasAllCapabilities(array $capabilityNames)
    {
        foreach($capabilityNames as $capabilityName)
        {
            if( ! $this->hasCapability($capabilityName)) return false;
        }
        return true;
    }

}
