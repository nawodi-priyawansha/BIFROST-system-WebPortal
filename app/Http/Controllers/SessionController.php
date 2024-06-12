<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function viewsession(){
        return view("admin.user.session");
    }
}
