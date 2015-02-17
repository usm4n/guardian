<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PackageDatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('PackageUsersTableSeeder');
        $this->call('PackageRolesTableSeeder');
        $this->call('PackageCapabilitiesTableSeeder');
        $this->call('PackageRoleUserPivotSeeder');
        $this->call('PackageCapabilityRolePivotSeeder');
    }

}
