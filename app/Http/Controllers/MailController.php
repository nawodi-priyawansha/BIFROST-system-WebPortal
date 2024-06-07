<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\FrogetPassword;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendForgotPasswordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            '_token' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        // dd($user);
        if ($user) {
            $token = Str::random(64);
            // Insert the password reset data into the 'password_reset' table
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now() // Using the helper function now() instead of Carbon::now()
            ]);

            try {
                // Send an email with the password reset link
                Mail::send('emails.forgot_password', ['token' => $token], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Reset Password');
                });

                // Redirect with success message if the email is sent successfully
                return redirect()->back();
            } catch (\Exception $e) {
                // TO DO return error page
                //    dd($e);
                return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
            }
        }
    }

    public function resetpassword_index($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();

        if ($passwordReset) {
            $createdAt = $passwordReset->created_at;
            $now = now();

            // Calculate the difference in minutes
            $differenceInMinutes = $createdAt->diffInMinutes($now);

            if ($differenceInMinutes <= 10) {
                return view('auth.reset-pin', compact('token'));
            } else {
                //  TO DO expire page link
                dd("expire");
            }
        }
    }

    // change pin number
    public function insert_new_pin(Request $request)
    {
        $passwordReset = PasswordReset::where('token', $request->token)->first();

        if ($passwordReset) {
            $createdAt = $passwordReset->created_at;
            $now = now();

            // Calculate the difference in minutes
            $differenceInMinutes = $createdAt->diffInMinutes($now);

            if ($differenceInMinutes <= 10) {
                $pin = $request->pin_1 . $request->pin_2 . $request->pin_3 . $request->pin_4;
                $confirmPin = $request->confirm_pin_1 . $request->confirm_pin_2 . $request->confirm_pin_3 . $request->confirm_pin_4;

                if ($pin === $confirmPin) {
                    $user = User::where('email', $passwordReset->email)->first();
                    if ($user) {
                        $user->pin1 = $request->pin_1;
                        $user->pin2 = $request->pin_2;
                        $user->pin3 = $request->pin_3;
                        $user->pin4 = $request->pin_4;
                        $user->save();

                        // Generate a new token
                        $newToken = Str::random(60);

                        // Update the password_resets table with the new token and current timestamp
                        $passwordReset->token = $newToken;
                        $passwordReset->save();

                        return view('auth.login');
                    } else {
                        // TO DO link page not found

                    }
                }
                // TO DO link page not found
                dd($request);
            } else {
                //  TO DO expire page link
                dd($request);
            }
        } else {
            // TO DO link page not found
        }
    }
}
