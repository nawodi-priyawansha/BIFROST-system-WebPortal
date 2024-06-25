<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Newprofile;
use App\Models\User;

class UserProfileController extends Controller
{
    // Display user profile if authorized
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
            return view('error.unauthorized');
        }
    }

    // Display new profile creation form
    public function viewnewprofile()
    {
        return view('user.user.new-profile');
    }

    // Handle form submission for creating a new profile
    public function newProfileShow(Request $request)
    {
        // dd($request);
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'age' => 'required|integer|min:0',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'height' => 'required|integer|min:0',
            'weight' => 'required|integer|min:0',
            'bmr' => 'required|numeric|min:0',
            'primary-goal' => 'required|string|max:255',
            'subscription-level' => 'required|string|max:255',
            'profile_image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB per file
        ]);

        // Handle  image uploads
        $imagePaths = [];
        if ($request->hasFile('profile_image')) {
            foreach ($request->file('profile_image') as $file) {
                $imageName = time() . '-' . $file->getClientOriginalName();
                $filePath = $file->storeAs('profile_images', $imageName, 'public');
                $imagePaths[] = $filePath;
            }
        }

        // Generate 4-digit PIN
        $pin = str_pad(random_int(1000, 9999), 4, '0', STR_PAD_LEFT);

        // Create new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->pin = $pin;
        $user->user_type = 'client'; // Default user type
        $user->save();

        // Create new profile associated with the user
        $profile = new Newprofile();
        $profile->user_id = $user->id;
        $profile->name = $validatedData['name'];
        $profile->nickname = $validatedData['nickname'];
        $profile->dob = $validatedData['dob'];
        $profile->gender = $validatedData['gender'];
        $profile->age = $validatedData['age'];
        $profile->phone = $validatedData['phone'];
        $profile->email = $validatedData['email'];
        $profile->address = $validatedData['address'];
        $profile->height = $validatedData['height'];
        $profile->weight = $validatedData['weight'];
        $profile->bmr = $validatedData['bmr'];
        $profile->primary_goal = $validatedData['primary-goal'];
        $profile->subscription_level = $validatedData['subscription-level'];
        $profile->image_paths = json_encode($imagePaths); // Store image paths in JSON format
        // dd($profile);
        $profile->save();

        // Optionally, you can return a response or redirect
        return redirect()->route('userprofile')->with('success', 'Profile created successfully!');
    }
}
