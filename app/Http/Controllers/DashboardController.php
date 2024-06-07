<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{
     public function viewdashboard(){
        return view('admin.user.dashboard');
     }

     public function viewfinancial(){
      return view('admin.user.financial');
     }

     public function viewaccess(){
      return view('admin.user.access');
     }
}
