<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\User;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    //

    public function viewaccess()
    {
        // Fetch the first 5 users with their access types
        $users = User::join('access', 'users.id', '=', 'access.user_id')
                     ->select('users.*', 'access.*')
                     ->take(5)
                     ->get();

        return view('admin.user.access', compact('users'));
    }

    public function setData($name, $email)
    {
        // TO DO access table name and e mail update 
        return response()->json(
            "Data received successfully"
        );
    }
}
