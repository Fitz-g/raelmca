<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
