<?php namespace Usman\Guardian\AccessControl;

trait AccessControlTrait {

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

    public function hasAnyRole(array $roleNames)
    {
        foreach($roleNames as $roleName)
        {
            if($this->hasRole($roleName)) return true;
        }
        return false;
    }

    public function hasAllRoles(array $roleNames)
    {
        foreach($roleNames as $roleName)
        {
            if( ! $this->hasRole($roleName)) return false;
        }
        return true;
    }


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

    public function hasAnyCapability(array $capabilityNames)
    {
        foreach($capabilityNames as $capabilityName)
        {
            if($this->hasCapability($capabilityName)) return true;
        }
        return false;

    }

    public function hasAllCapabilities(array $capabilityNames)
    {
        foreach($capabilityNames as $capabilityName)
        {
            if( ! $this->hasCapability($capabilityName)) return false;
        }
        return true;
    }


}