<?php

use Illuminate\Database\Seeder;

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

        $capability = config('guardian.capabilityModel');
        
        foreach($seeds as $seed)
        {
            $capability::create($seed);
        }
    }

}