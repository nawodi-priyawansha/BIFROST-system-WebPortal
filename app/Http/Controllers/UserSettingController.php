<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserSettingController extends Controller
{
    //
    public function viewsetting()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

        // Fetch the access record for the user
        $access = Access::where('user_id', $userId)->first();

        if ($access && $access->settings === 'enable') {
            // Pass the access type to the view using compact
            $accessType = $access->access_type;
            return view('user.user.settings', compact('accessType'));
        } else {
            // Redirect to an unauthorized access view
            return view('error.useruthorized');
        }
    }
}
