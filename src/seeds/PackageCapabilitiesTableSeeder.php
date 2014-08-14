<?php

class PackageCapabilitiesTableSeeder extends Seeder {

	public function run()
	{
		$seeds = [
			[
				'capability' => 'create_user',
				'description'    => 'Capability to create users'
			],
			[
				'capability' => 'delete_user',
				'description'    => 'Capability to delete users'
			],
			[
				'capability' => 'edit_user',
				'description'    => 'Capability to edit users'
			],
			[
				'capability' => 'manage_users',
				'description'    => 'Capability to manage all users'
			],
		];
		foreach($seeds as $seed)
		{
			Capability::create($seed);
		}
	}

}