<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    //
    public function viewstatistics(){
        return view("admin.user.statistics");
    }
}
