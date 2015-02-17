<?php

use App\User;
use Illuminate\Database\Seeder;

class PackageUsersTableSeeder extends Seeder {

    public function run()
    {
        $seeds = [
            [
                'username' => 'riaz',
                'password' => Hash::make('pass123'),
                'email'    => 'xyz@xyz.com'
            ],
            [
                'username' => 'noman',
                'password' => Hash::make('pass123'),
                'email'    => 'xyz@xyz.com'
            ],
            [
                'username' => 'affan',
                'password' => Hash::make('pass123'),
                'email'    => 'xyz@xyz.com'
            ],
            [
                'username' => 'user123',
                'password' => Hash::make('pass123'),
                'email'    => 'xyz@xyz.com'
            ]
        ];

        $user = config('guardian.userModel');
        
        foreach ($seeds as $seed)
        {
            $user::create($seed);
        }
    }

}