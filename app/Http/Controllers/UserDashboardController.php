<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //user dashboard
    public function viewdashboard()
    {
        return view('user.user.dashboard');
    }

    // user profile
    public function viewprofile()
    {
        return view('user.user.profile');
    }
    // user profile
    public function viewnewprofile()
    {
        return view('user.user.new-profile');
    }
}
