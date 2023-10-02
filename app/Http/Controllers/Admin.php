<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class Admin extends Controller
{
    public function principalAdmin()
    {
        return view('home');
    }

    public function home()
    {
        return view('home');
    }

    public function logOut()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
