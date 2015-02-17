<?php

use Illuminate\Database\Seeder;

class PackageCapabilityRolePivotSeeder extends Seeder {

    public function run()
    {
    	$role = config('guardian.roleModel');
    	
        $role::find(1)->capabilities()->withTimeStamps()->attach([1,2]);
        $role::find(2)->capabilities()->withTimeStamps()->attach(3);
    }

}