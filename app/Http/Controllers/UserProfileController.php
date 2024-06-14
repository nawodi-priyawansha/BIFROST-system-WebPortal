<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    //

    // user profile
    public function viewprofile()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

        // Fetch the access record for the user
        $access = Access::where('user_id', $userId)->first();

        if ($access && $access->profile === 'enable') {
            // Pass the access type to the view using compact
            $accessType = $access->access_type;
            return view('user.user.profile', compact('accessType'));
        } else {
            // Redirect to an unauthorized access view
            return view('error.useruthorized');
        }
    }
    // user profile
    public function viewnewprofile()
    {
        return view('user.user.new-profile');
    }
}
