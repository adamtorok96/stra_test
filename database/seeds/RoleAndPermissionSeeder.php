<?php

use Illuminate\Database\Seeder;
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
        $admin = Role::create([
            'name' => 'admin'
        ]);

        $contentEditor = Role::create([
            'name' => 'contentEditor'
        ]);

        $loggedInUser = Role::create([
           'name' => 'loggedInUser'
        ]);
    }
}
