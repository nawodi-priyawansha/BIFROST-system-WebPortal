<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobileController extends Controller
{
    //
    public function login()
    {
        return view("mobile.auth.login");
    }
    public function forgetpin()
    {
        return view("mobile.auth.forgetpin");
    }

    public function trainingday(){
        return view("mobile.user.trainingday");
    }

    public function readinessscore(){
        return view("mobile.user.readinessscore");
    }
}
