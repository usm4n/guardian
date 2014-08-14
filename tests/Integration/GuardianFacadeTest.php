<?php

class GuardianFacadeTest extends GuardianTestCase {

	protected $user;
	
	public function setUp()
	{
		parent::setUp();
		$this->prepareDB();
		$this->user = User::find(1);
	}	

	public function test_has_role_when_logged_in()
	{
		$this->be($this->user);
		$status = Guardian::hasRole('administrator');
		
		$this->assertTrue($status);
	}
	public function test_has_any_role_when_logged_in()
	{
		$this->be($this->user);
		$status = Guardian::hasAnyRole(['editor','reporter']);

		$this->assertTrue($status);
	}

	public function test_has_all_role_when_logged_in()
	{
		$this->be($this->user);
		$status = Guardian::hasAllRoles(['editor','reporter']);

		$this->assertFalse($status);
	}

	public function test_has_capability_when_logged_in()
	{
		$this->be($this->user);
		$status1 = Guardian::hasCapability('manage_users');
		$status2 = Guardian::hasCapability('create_user');

		$this->assertFalse($status1);
		$this->assertTrue($status2);
	}

	public function test_has_any_capability_when_logged_in()
	{
		$this->be($this->user);
		$status1 = Guardian::hasAnyCapability(['create_user','delete_user']);
		$status2 = Guardian::hasAnyCapability(['manage_users']);

		$this->assertTrue($status1);
		$this->assertFalse($status2);
	}

	public function test_has_all_capabilities_when_logged_in()
	{
		$this->be($this->user);
		$status1 = Guardian::hasAllCapabilities(['create_user','delete_user']);
		$status2 = Guardian::hasAllCapabilities(['manage_users,create_user']);

		$this->assertTrue($status1);
		$this->assertFalse($status2);	
	}

	public function test_all_false_when_not_logged_in()
	{
		$this->assertFalse(Guardian::hasRole('editor'));
		$this->assertFalse(Guardian::hasAnyRole(['editor']));
		$this->assertFalse(Guardian::hasAllRoles(['editor','reporter']));
		$this->assertFalse(Guardian::hasCapability('create_user'));
		$this->assertFalse(Guardian::hasAnyCapability(['create_user','edit_user']));
		$this->assertFalse(Guardian::hasAllCapabilities(['create_user','edit_user']));
	}

}