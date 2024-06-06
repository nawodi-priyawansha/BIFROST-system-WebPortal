<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            $user = User::where(function ($query) use ($request) {
                if ($request->portal === 'admin') {
                    $query->whereIn('user_type', ['admin', 'super admin']);
                } else {
                    $query->where('user_type', 'client')->orWhere('user_type', 'worker');
                }
            })
                ->where('pin1', $request->pin_1)
                ->where('pin2', $request->pin_2)
                ->where('pin3', $request->pin_3)
                ->where('pin4', $request->pin_4)
                ->first();


            if ($user) {
                if ($user->user_type == "admin" || $user->user_type == "super admin") {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->user_type == "client" || $user->user_type == "worker") {
                    return redirect()->route('user.dashboard');
                }
            }


            // If no user is found, redirect back with an error message
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
        }
    }
}
