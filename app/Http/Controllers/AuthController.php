<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    // login
    public function login(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'pin_1' => 'required|integer|min:0|max:9',
                'pin_2' => 'required|integer|min:0|max:9',
                'pin_3' => 'required|integer|min:0|max:9',
                'pin_4' => 'required|integer|min:0|max:9',
            ]);

            $user = User::where('user_type', $request->portal)
                ->where('pin1', $request->pin_1)
                ->where('pin2', $request->pin_2)
                ->where('pin3', $request->pin_3)
                ->where('pin4', $request->pin_4)
                ->first();

            if ($user) {
                // Assuming 'admin.user.dashboard' is the correct view name for the admin user's dashboard
                if ($user->user_type == "admin") {
                    return view('admin.user.dashboard');
                }

                // Redirect to the appropriate view for non-admin users
                // Replace 'user.dashboard' with the correct view name
                dd("return user view");
            }

            // If no user is found, redirect back with an error message
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }
    }
}
