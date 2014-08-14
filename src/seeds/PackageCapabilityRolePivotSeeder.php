<?php

class PackageCapabilityRolePivotSeeder extends Seeder {

	public function run()
	{
		Role::find(1)->capabilities()->withTimeStamps()->attach([1,2]);
		Role::find(2)->capabilities()->withTimeStamps()->attach(3);
	}

}