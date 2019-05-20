<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var $admin User
         */
        $admin = User::create([
            'username' => 'Admin',
            'password' => Hash::make('Admin_pass')
        ]);

        $admin->assignRole('admin');

        /**
         * @var $user_1 User
         */
        $user_1 = User::create([
            'username' => 'User_1',
            'password' => Hash::make('User_1_pass')
        ]);

        $user_1->assignRole('contentEditor');
        $user_1->assignRole('loggedInUser');

        /**
         * @var $user_2 User
         */
        $user_2 = User::create([
            'username' => 'User_2',
            'password' => Hash::make('User_2_pass')
        ]);

        $user_2->assignRole('contentEditor');

        /**
         * @var $user_3 User
         */
        $user_3 = User::create([
            'username' => 'User_3',
            'password' => Hash::make('User_3_pass')
        ]);

        $user_3->assignRole('loggedInUser');
    }
}
