<?php

class GuardianTestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../../../bootstrap/start.php';
	}

	public function prepareDB()
	{
		Artisan::call('migrate:refresh');
		Artisan::call('migrate',['--bench'=>'usm4n/guardian']);
		Artisan::call('db:seed',['--class'=>'PackageDatabaseSeeder']);
	}

}
