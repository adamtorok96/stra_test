<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if( !Auth::check() ) {
            return redirect()->route('auth.index');
        }

        return redirect()->route('admin.home.index');
    }
}