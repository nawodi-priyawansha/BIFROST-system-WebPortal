<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WorkoutLibraryController extends Controller
{
    //
    public function viewworkoutlibrary()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

         // Fetch the access record for the user
         $access = Access::where('user_id', $userId)->first();

         if ($access && $access->workout_library === 'enable')
        {
             // Pass the access type to the view using compact
             $accessType = $access->access_type;
             return view('admin.user.workout_library', compact('accessType'));
        }
        else
        {
             // Redirect to an unauthorized access view
             return view('error.unauthorized');
        }
    }
}
