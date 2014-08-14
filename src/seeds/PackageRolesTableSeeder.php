<?php

class PackageRolesTableSeeder extends Seeder {

    public function run()
    {
        $seeds = [
            [
                'role_name'    => 'Administrator',
                'description'  => 'Site Admin',
            ],
            [
                'role_name'    => 'Editor',
                'description'  => 'News Editor and Publisher',

            ],
            [
                'role_name'    => 'Reporter',
                'description'  => 'News Reporter',
            ],
            [
                'role_name'    => 'Subscriber',
                'description'  => 'News Subscriber',
            ]
        ];
        foreach($seeds as $seed)
        {
            Role::create($seed);
        }
    }

}