<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;

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

    public function workout(){
        return view("mobile.user.workout");
    }

    public function workouttimer(){
        return view("mobile.user.workout-timer");
    }

    public function histroyview(){
        return view("mobile.user.history");
    } 
    
}
