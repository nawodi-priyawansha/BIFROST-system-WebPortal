<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAchievementsController extends Controller
{
    //
    public function viewachievement()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

         // Fetch the access record for the user
         $access = Access::where('user_id', $userId)->first();

         if ($access && $access->achievements === 'enable')
        {
             // Pass the access type to the view using compact
             $accessType = $access->access_type;
             return view('user.user.achievements', compact('accessType'));
        }
        else
        {
             // Redirect to an unauthorized access view
             return view('error.useruthorized');
        }
    }
}
