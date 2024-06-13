<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //user dashboard
    public function viewdashboard()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

         // Fetch the access record for the user
         $access = Access::where('user_id', $userId)->first();

         if ($access && $access->user_dashboard === 'enable')
        {
             // Pass the access type to the view using compact
             $accessType = $access->access_type;
             return view('user.user.dashboard', compact('accessType'));
        }
        else
        {
             // Redirect to an unauthorized access view
             return view('error.unauthorized');
        }
    }

    // user profile
    public function viewprofile()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

         // Fetch the access record for the user
         $access = Access::where('user_id', $userId)->first();

         if ($access && $access->profile === 'enable')
        {
             // Pass the access type to the view using compact
             $accessType = $access->access_type;
             return view('user.user.profile', compact('accessType'));
        }
        else
        {
             // Redirect to an unauthorized access view
             return view('error.unauthorized');
        }
    }
    // user profile
    public function viewnewprofile()
    {
        return view('user.user.new-profile');
    }
}
