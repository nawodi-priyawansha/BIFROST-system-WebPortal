<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Newprofile;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserDashboardController extends Controller
{
    //user dashboard
    public function viewdashboard()
    {
        try {
            $user = Auth::user(); // Get the currently authenticated user

            if (!$user) {
                // If the user is not authenticated, return the unauthorized view
                return view('error.unauthorized');
            }

            $member = Newprofile::where('user_id', $user->id)->first();
            // Decode the image paths if necessary
            $imagePaths = json_decode($member->image_paths, true);

            // Check if decoding was successful
            if (is_array($imagePaths) && !empty($imagePaths)) {
                $profileImage = 'storage/' . $imagePaths[0]; // Assuming you want the first image
            } else {
                $profileImage = 'storage/default-profile.png'; // Default image if no image paths
            }
            // dd($profileImage);

            return view('user.user.dashboard', compact('user', 'member', 'profileImage'));
        } catch (Exception $e) {
            // Log the error message
            Log::error('Error in viewdashboard: ' . $e->getMessage());

            // Return a generic error view or an unauthorized view
            return view('error.unauthorized');
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
