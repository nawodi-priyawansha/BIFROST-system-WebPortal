<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Access;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    //user dashboard
    public function viewdashboard()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

        // Fetch the access record for the user
        $access = Access::where('user_id', $userId)->first();

        if ($access && $access->user_dashboard === 'enable') {
            // Pass the access type to the view using compact
            $accessType = $access->access_type;
            return view('user.user.dashboard', compact('accessType'));
        } else {
            // Redirect to an unauthorized access view
            return view('error.useruthorized');
        }
    }

    //  Dashboard Search Function
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search
        $user = User::where('user_type', 'client')
            ->where('name', 'like', '%' . $query . '%')
            ->first();

        if ($user) {
            // Store user details in session
            Session::put('searchedUser', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                // Add other user details as needed
            ]);

            return response()->json(['user' => $user]);
        } else {
            // Clear session if no user found
            Session::forget('searchedUser');

            return response()->json(['user' => null]);
        }
    }


    // // Clear searched user details from session
    // public function clearSearchedUser()
    // {
    //     Session::forget('searchedUser');

    //     return redirect()->back()->with('message', 'Searched user details cleared from session.');
    // }
}
