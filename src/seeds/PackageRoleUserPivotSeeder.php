<?php

class PackageRoleUserPivotSeeder extends Seeder {

    public function run()
    {
        User::find(1)->roles()->withTimeStamps()->attach([1,2]);
        User::find(2)->roles()->withTimeStamps()->attach(3);
        User::find(3)->roles()->withTimeStamps()->attach(1);
    }

}