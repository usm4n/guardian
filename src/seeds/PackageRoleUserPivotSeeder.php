<?php

use Illuminate\Database\Seeder;

class PackageRoleUserPivotSeeder extends Seeder {

    public function run()
    {	
    	$user = config('guardian.userModel');

        $user::find(1)->roles()->withTimeStamps()->attach([1,2]);
        $user::find(2)->roles()->withTimeStamps()->attach(3);
        $user::find(3)->roles()->withTimeStamps()->attach(1);
    }

}