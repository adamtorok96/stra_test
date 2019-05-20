<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var $admin Role
         */
        $admin = Role::create([
            'name' => 'admin'
        ]);

        /**
         * @var $contentEditor Role
         */
        $contentEditor = Role::create([
            'name' => 'contentEditor'
        ]);

        /**
         * @var $loggedInUser Role
         */
        $loggedInUser = Role::create([
           'name' => 'loggedInUser'
        ]);

        $showContentEditor = Permission::create([
            'name' => 'show content editor'
        ]);

        $showLoggedInUsers = Permission::create([
            'name' => 'show logged in users'
        ]);

        $admin->givePermissionTo($showContentEditor);
        $admin->givePermissionTo($showLoggedInUsers);

        $contentEditor->givePermissionTo($showContentEditor);

        $loggedInUser->givePermissionTo($showLoggedInUsers);
    }
}
