<?php

class PackageUsersTableSeeder extends Seeder {

	public function run()
	{
		$seeds = [
			[
				'username' => 'riaz',
				'password' => 'pass123',
				'email'    => 'xyz@xyz.com'
			],
			[
				'username' => 'noman',
				'password' => 'pass123',
				'email'    => 'xyz@xyz.com'
			],
			[
				'username' => 'affan',
				'password' => 'pass123',
				'email'    => 'xyz@xyz.com'
			],
			[
				'username' => 'user123',
				'password' => 'pass123',
				'email'    => 'xyz@xyz.com'
			]
		];
		foreach ($seeds as $seed)
		{
			User::create($seed);
		}
	}

}