<?php


namespace App\Http\Controllers\Admin;


class LoggedInUsersController
{
    public function index()
    {
        return view('admin.logged-in-users.index');
    }
}