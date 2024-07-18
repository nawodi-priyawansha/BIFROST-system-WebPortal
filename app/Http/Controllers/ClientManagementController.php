<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\ClientManagement;
use App\Models\Newprofile;
use App\Models\User;
use App\Models\WorkoutLibrary;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

class ClientManagementController extends Controller
{
    public function viewClientManagement()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

        // Fetch the access record for the user
        $access = Access::where('user_id', $userId)->first();
        $members = Newprofile::all();

        if ($access && $access->client_management === 'enable') {
            // Pass the access type to the view using compact
            $accessType = $access->access_type;
            return view('admin.user.client_management', compact('accessType', 'members'));
        } else {
            // Redirect to an unauthorized access view
            return view('error.unauthorized');
        }
    }

    public function store(Request $request)
    {
        // dd($request);
        $date = $request->selectdate;
        $tab = strtolower($request->selecttab);

        $arrays = [];
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^(category|workout|reps|custom|rest|intensity)$/', $key)) {
                $arrays[1][$key] = $value;
            } elseif (preg_match('/^(category|workout|reps|custom|rest|intensity)_(\d+)$/', $key, $matches)) {
                $type = $matches[1];
                $index = $matches[2];
                if (!isset($arrays[$index])) {
                    $arrays[$index] = [];
                }
                $arrays[$index][$type] = $value;
            }
        }

        foreach ($arrays as $data) {
            $clientManagement = new ClientManagement();
            $clientManagement->category = $data['category'] ?? null;
            $clientManagement->workout = $data['workout'] ?? null;
            $clientManagement->reps = $data['reps'] ?? null;
            $clientManagement->reps_per_set = $data['custom'] ?? null;
            // Format the time here
            $restTime = DateTime::createFromFormat('H:i', $data['rest']);
            $clientManagement->rest = $restTime ? $restTime->format('h:i') : null;
            $clientManagement->intensity = $data['intensity'] ?? null;
            $clientManagement->date = $date;
            $clientManagement->tab = $tab;
            $clientManagement->save();
        }
        return redirect()->back();
    }

    public function getdata(Request $request)
    {
        $tab = strtolower($request->tab);
        $date = $request->date;
        $workouts = WorkoutLibrary::where('type', $tab)->with('categoryOption',)->get();
        $details = ClientManagement::where('tab', $tab)
            ->where('date', $date)
            ->with('workout.categoryOption')
            ->get();

        return response()->json(['workouts' => $workouts, 'details' => $details]);
    }
    public function getworkout(Request $request)
    {
        $tab = strtolower($request->tab);
        $id = $request->id;
        // category option id andb type filter
        $workouts = WorkoutLibrary::where([
            ['type', $tab],
            ['category_options_id', $id],
        ])->get();
        return response()->json(['workouts' => $workouts]);
    }
    public function update(Request $request)
    {
        // Extracting data from the request
        $data = $request->all();

        // Loop through the data to find detail ids and update the corresponding records
        foreach ($data as $key => $value) {
            if (preg_match('/^detail_id_(\d+)$/', $key, $matches)) {
                $id = $matches[1];

                // Find the ClientManagement record by id
                $clientManagement = ClientManagement::find($value);

                if ($clientManagement) {
                    // Update the fields
                    $clientManagement->category = $data["category_$id"] ?? null;
                    $clientManagement->workout = $data["workout_$id"] ?? null;
                    $clientManagement->reps = $data["reps_$id"] ?? null;
                    $clientManagement->reps_per_set = $data["reps_per_set_$id"] ?? null;

                    // Format the time here
                    $restTime = DateTime::createFromFormat('H:i', $data["rest_$id"]);
                    $clientManagement->rest = $restTime ? $restTime->format('h:i') : null;

                    $clientManagement->intensity = $data["intensity_$id"] ?? null;

                    // Save the updated record
                    $clientManagement->save();
                }
            }
        }
        return redirect()->back();
    }

    public function newProfileclientShow($action = 'add', $id = null)
    {
        // Debug to see what's being passed
        // dd($action, $id);

        // Fetch data if editing an existing profile
        if ($action == 'edit' && $id) {
            $member = Newprofile::findOrFail($id);
        } else {
            // Set $member to null or create a new instance if adding a new profile
            $member = null;
        }

        // Return view with data
        return view('admin.user.client-newprofile', compact('action', 'member'));
    }

    public function addnewclient(Request $request)
    {
        try {
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
                'subscription_level' => 'required|string|max:255',
                'profile_image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB per file
            ]);

            // Check if the email already exists
            if (User::where('email', $validatedData['email'])->exists()) {
                return redirect()->back()->withErrors(['email' => 'The email has already been taken.'])->withInput();
            }

            // Handle image uploads
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
            $profile->dob = Carbon::parse($validatedData['dob']);
            $profile->gender = $validatedData['gender'];
            $profile->age = $validatedData['age'];
            $profile->phone = $validatedData['phone'];
            $profile->email = $validatedData['email'];
            $profile->address = $validatedData['address'];
            $profile->height = $validatedData['height'];
            $profile->weight = $validatedData['weight'];
            $profile->bmr = $validatedData['bmr'];
            $profile->primary_goal = $validatedData['primary-goal'];
            $profile->subscription_level = $validatedData['subscription_level'];
            $profile->image_paths = json_encode($imagePaths); // Store image paths in JSON format
            $profile->save();

            // Optionally, you can return a response or redirect
            return redirect()->route('viewadminclientmanagement')->with('success', 'Profile created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }
    public function updatenewclient(Request $request, $id)
    {
        try {
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
                'subscription_level' => 'required|string|max:255',
                'profile_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB per file
            ]);

            // Fetch the profile to update
            $profile = Newprofile::findOrFail($id);

            // Update user associated with the profile if email changes
            if ($profile->email !== $validatedData['email']) {
                // Check if the email already exists
                if (User::where('email', $validatedData['email'])->exists()) {
                    return redirect()->back()->withErrors(['email' => 'The email has already been taken.'])->withInput();
                }
                $profile->user->update(['email' => $validatedData['email']]);
            }

            // Handle image uploads if provided
            $imagePaths = $profile->image_paths ? json_decode($profile->image_paths, true) : [];
            if ($request->hasFile('profile_image')) {
                foreach ($request->file('profile_image') as $file) {
                    $imageName = time() . '-' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('profile_images', $imageName, 'public');
                    $imagePaths[] = $filePath;
                }
            }

            // Update the profile data
            $profile->update([
                'name' => $validatedData['name'],
                'nickname' => $validatedData['nickname'],
                'dob' => Carbon::parse($validatedData['dob']),
                'gender' => $validatedData['gender'],
                'age' => $validatedData['age'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'height' => $validatedData['height'],
                'weight' => $validatedData['weight'],
                'bmr' => $validatedData['bmr'],
                'primary_goal' => $validatedData['primary-goal'],
                'subscription_level' => $validatedData['subscription_level'],
                'image_paths' => json_encode($imagePaths) // Store updated image paths in JSON format
            ]);

            // Optionally, you can return a response or redirect
            return redirect()->route('viewadminclientmanagement')->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }


    public function deleteProfile($id)
    {
        // dd($id);
        try {
            // Find the user by ID
            $user = Newprofile::findOrFail($id);

            // Delete the user (this will also delete the associated profile if set up with foreign key constraints)
            $user->delete();

            // Redirect with a success message
            return redirect()->route('viewadminclientmanagement')->with('success', 'Profile deleted successfully!');
        } catch (\Exception $e) {
            // Redirect with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function removeImage(Request $request, $id)
    {
        $member = Newprofile::findOrFail($id);
        $images = json_decode($member->image_paths, true);
        $imageToRemove = $request->image;

        // Remove the image from the storage
        Storage::delete('public/' . $imageToRemove);

        // Remove the image from the array
        $images = array_filter($images, function ($image) use ($imageToRemove) {
            return $image !== $imageToRemove;
        });

        // Update the member's image_paths
        $member->image_paths = json_encode(array_values($images));
        $member->save();

        return response()->json(['success' => 'Image removed successfully']);
    }
}
