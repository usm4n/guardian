<?php

class PackageDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PackageUsersTableSeeder');
		$this->call('PackageRolesTableSeeder');
		$this->call('PackageCapabilitiesTableSeeder');
		$this->call('PackageRoleUserPivotSeeder');
		$this->call('PackageCapabilityRolePivotSeeder');
	}

}
