<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    //
    public function viewcommunication(){
        return view("admin.user.communication");
    }
}
