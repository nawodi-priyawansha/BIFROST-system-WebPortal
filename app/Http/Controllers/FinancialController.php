<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancialController extends Controller
{
    //
    public function viewfinancial(){
        return view('admin.user.financial');
       }
}
