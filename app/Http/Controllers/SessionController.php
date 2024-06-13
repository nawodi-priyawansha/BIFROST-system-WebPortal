<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //
    public function viewsession()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

         // Fetch the access record for the user
         $access = Access::where('user_id', $userId)->first();

         if ($access && $access->session === 'enable')
        {
             // Pass the access type to the view using compact
             $accessType = $access->access_type;
             return view('admin.user.session', compact('accessType'));
        }
        else
        {
             // Redirect to an unauthorized access view
             return view('error.unauthorized');
        }
    }
}
