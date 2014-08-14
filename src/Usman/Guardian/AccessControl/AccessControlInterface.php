<?php namespace Usman\Guardian\AccessControl;

interface AccessControlInterface {
	
	public function hasRole($roleName);

	public function hasAnyRole(array $roleNames);

	public function hasAllRoles(array $roleNames);

	public function hasCapability($capabilityName);

	public function hasAnyCapability(array $capabilityName);

	public function hasAllCapabilities(array $capabilityNames);

}