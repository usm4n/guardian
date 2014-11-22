<?php namespace Usman\Guardian\AccessControl;

interface AccessControlInterface {
    
    /**
     * Checks for a role
     * 
     * @param  string  $roleName
     * @return boolean
     */
    public function hasRole($roleName);

    /**
     * Checks for any role
     * 
     * @param  array   $roleNames
     * @return boolean
     */
    public function hasAnyRole(array $roleNames);

    /**
     * Checks for all roles
     * 
     * @param  array   $roleNames
     * @return boolean
     */
    public function hasAllRoles(array $roleNames);

    /**
     * Checks if a user has a capability
     * 
     * @param  string  $capabilityName
     * @return boolean
     */
    public function hasCapability($capabilityName);

    /**
     * Checks if a user has any capability
     * 
     * @param  array   $capabilityNames
     * @return boolean
     */
    public function hasAnyCapability(array $capabilityName);

    /**
     * Checks if a user has all the capabilities
     * 
     * @param  array   $capabilityNames
     * @return boolean
     */
    public function hasAllCapabilities(array $capabilityNames);

}