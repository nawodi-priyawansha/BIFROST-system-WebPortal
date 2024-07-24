<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Access;
use App\Models\Warmup;
use App\Models\Newprofile;
use Illuminate\Http\Request;
use App\Models\WorkoutLibrary;
use App\Models\ClientManagement;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    // get category
    public function getCategory(Request $request)
    {
        $tab = strtolower($request->input('tab'));

        // Fetch workouts based on the type
        $workouts = WorkoutLibrary::where('type', $tab)
            ->with('categoryOption') // Load the category options
            ->get();

        // Get unique category options based on the fetched workouts
        $categoryOptions = $workouts->pluck('categoryOption')->unique('id');

        return response()->json([
            'category_options' => $categoryOptions
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        // Retrieve the date and tab from the request
        $date = $request->selectdate;
        $tab = strtolower($request->selecttab);

        // Initialize arrays to store the data
        $arrays = [];

        // Process primary data
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^(category|workout|sets|reps|rest|intensity)$/', $key)) {
                $arrays[1][$key] = $value;
                $arrays[1]['type'] = 'primary';
            } elseif (preg_match('/^(category|workout|sets|reps|rest|intensity)_(\d+)$/', $key, $matches)) {
                $type = $matches[1];
                $index = $matches[2];
                if (!isset($arrays[$index])) {
                    $arrays[$index] = [];
                }
                $arrays[$index][$type] = $value;
                if (!isset($arrays[$index]['type'])) {
                    $arrays[$index]['type'] = 'primary';
                }
            }
            if (preg_match('/^(alt-category|alt-workout|alt-sets|alt-reps|alt-rest|alt-intensity)$/', $key)) {
                $type = str_replace('alt-', '', $key);
                $arrays['alt'][$type] = $value;
                $arrays['alt']['type'] = 'alternate';
            } elseif (preg_match('/^(alt-category|alt-workout|alt-sets|alt-reps|alt-rest|alt-intensity)_(\d+)$/', $key, $matches)) {
                $type = str_replace('alt-', '', $matches[1]);
                $index = $matches[2];
                if (!isset($arrays['alt_' . $index])) {
                    $arrays['alt_' . $index] = [];
                }
                $arrays['alt_' . $index][$type] = $value;
                if (!isset($arrays['alt_' . $index]['type'])) {
                    $arrays['alt_' . $index]['type'] = 'alternate';
                }
            }
        }

        // Save primary data to the database
        foreach ($arrays as $index => $data) {
            if (strpos($index, 'alt') === false) {
                $clientManagement = new ClientManagement();
                $clientManagement->category = $data['category'] ?? null;
                $clientManagement->workout = $data['workout'] ?? null;
                $clientManagement->sets = $data['sets'] ?? null;
                $clientManagement->reps = $data['reps'] ?? null;
                $clientManagement->rest = $data['rest'] ?? null;
                $clientManagement->intensity = $data['intensity'] ?? null;
                $clientManagement->date = $date;
                $clientManagement->tab = $tab;
                $clientManagement->type = $data['type'] ?? 'primary';
                $clientManagement->save();
            }
        }

        // Save alternate data to the database
        foreach ($arrays as $index => $data) {
            if (strpos($index, 'alt') !== false) {
                $clientManagement = new ClientManagement();
                $clientManagement->category = $data['category'] ?? null;
                $clientManagement->workout = $data['workout'] ?? null;
                $clientManagement->sets = $data['sets'] ?? null;
                $clientManagement->reps = $data['reps'] ?? null;
                $clientManagement->rest = $data['rest'] ?? null;
                $clientManagement->intensity = $data['intensity'] ?? null;
                $clientManagement->date = $date;
                $clientManagement->tab = $tab;
                $clientManagement->type = $data['type'] ?? 'alternate';
                $clientManagement->save();
            }
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
            ->with('workouts.categoryOption')
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
                    $clientManagement->sets = $data["sets_$id"] ?? null;
                    $clientManagement->reps = $data["reps_$id"] ?? null;

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

    public function storewarmup(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'categoryw_*' => 'required|exists:category_options,id',
            'workoutw_*' => 'required|exists:workout_libraries,id',
            'repsw_*' => 'required|integer',
            'weigthw_*' => 'required|numeric',
            'selectdatew' => 'required',  // Validate the date
        ]);

        // Extract the data from the request
        $warmups = [];
        $date = $request->input('selectdatew');  // Get the date

        foreach ($request->all() as $key => $value) {
            if (preg_match('/^categoryw_(\d+)$/', $key, $matches)) {
                $index = $matches[1];
                $warmups[$index]['category_id'] = $value;
            } elseif (preg_match('/^workoutw_(\d+)$/', $key, $matches)) {
                $index = $matches[1];
                $warmups[$index]['workout_id'] = $value;
            } elseif (preg_match('/^repsw_(\d+)$/', $key, $matches)) {
                $index = $matches[1];
                $warmups[$index]['reps'] = $value;
            } elseif (preg_match('/^weigthw_(\d+)$/', $key, $matches)) {
                $index = $matches[1];
                $warmups[$index]['weight'] = $value;
            }
        }

        // Store each warmup set with the date
        foreach ($warmups as $warmupData) {
            $warmupData['date'] = $date;  // Add the date to each record
            Warmup::create($warmupData);
        }

        // Redirect or respond with a success message
        return redirect()->back()->with('success', 'Warmup data stored successfully!');
    }

    public function updateWarmup(Request $request)
    {
        // Validate the common ID
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:warmups,id',
        ]);
    
        // Find the warmup record by ID
        $warmup = Warmup::findOrFail($validatedData['id']);
    
        // Loop through the request data to update corresponding fields
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^categorywe_(\d+)$/', $key, $matches)) {
                $index = $matches[1];
    
                $validatedFormData = $request->validate([
                    "categorywe_$index" => 'required|integer|exists:category_options,id',
                    "workoutwe_$index" => 'required|integer|exists:workout_libraries,id',
                    "repswe_$index" => 'required|integer|min:1',
                    "weightwe_$index" => 'required|numeric|min:0',
                ]);
    
                // Update the warmup record with the validated data
                $warmup->category_id = $validatedFormData["categorywe_$index"];
                $warmup->workout_id = $validatedFormData["workoutwe_$index"];
                $warmup->reps = $validatedFormData["repswe_$index"];
                $warmup->weight = $validatedFormData["weightwe_$index"];
                $warmup->save();
            }
        }
    
        // Return a response
        return redirect()->back()->with('message', 'Warmup updated successfully');
    }
    // delete warmup
    public function deleteAllBySelectDate(Request $request)
    {
        $selectDate = $request->input('selectdatewd');
        
        // Validate the input
        $request->validate([
            'selectdatewd' => 'required',  // Assuming selectdatew is a date
        ]);

        // Delete all warmups with the given selectdatew
        Warmup::where('date', $selectDate)->delete();

        return redirect()->back()->with('message', 'All warmups for the selected date have been deleted successfully');
    }
    // get Warmup
    public function getwarmup(Request $request)
    {
        $date = $request->input('date');
    
        // Fetch warmup data with related category and workout details
        $warmup = Warmup::with(['category', 'workout'])
                        ->where('date', $date)
                        ->get();
    
        // ctecory list
// Fetch workouts based on the type
$workouts = WorkoutLibrary::where('type','warmup')
->with('categoryOption') // Load the category options
->get();

// Get unique category options based on the fetched workouts
$categoryOptions = $workouts->pluck('categoryOption')->unique('id');


        // Transform the result to include the desired fields
        $result = $warmup->map(function ($item) {
            return [
                'id' => $item->id,
                'date' => $item->date,
                'category_id' => $item->category_id,
                'weight' => $item->weight,
                'category_name' => $item->category ? $item->category->category_name : null,
                'workout_id' => $item->workout_id,
                'workout_type' => $item->workout ? $item->workout->type : null,
                'reps' => $item->reps,
            ];
        });
    
        return response()->json(['result'=>$result,'categoryOptions'=>$categoryOptions]);
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

    // add new function
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

    // update function
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
                'profile_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Fetch the profile to update
            $profile = Newprofile::findOrFail($id);

            // Update user associated with the profile if email changes
            if ($profile->email !== $validatedData['email']) {
                if (User::where('email', $validatedData['email'])->exists()) {
                    return redirect()->back()->withErrors(['email' => 'The email has already been taken.'])->withInput();
                }
                $profile->user->update(['email' => $validatedData['email']]);
            }

            // Delete old images if any
            $oldImagePaths = $profile->image_paths ? json_decode($profile->image_paths, true) : [];
            foreach ($oldImagePaths as $oldImagePath) {
                if (Storage::disk('public')->exists($oldImagePath)) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }

            // Handle image uploads if provided
            $imagePaths = [];
            if ($request->hasFile('profile_image')) {
                foreach ($request->file('profile_image') as $file) {
                    $imageName = time() . '-' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('profile_images', $imageName, 'public');
                    $imagePaths[] = $filePath;
                    \Log::info('Uploaded file path: ' . $filePath);
                }
            }

            \Log::info('Image paths before update: ', $imagePaths);

            // Update the profile data
            $updateSuccessful = $profile->update([
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
                'image_paths' => json_encode($imagePaths),
            ]);

            \Log::info('Profile data after update: ', $profile->toArray());

            if ($updateSuccessful) {
                return redirect()->route('viewadminclientmanagement')->with('success', 'Profile updated successfully!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Profile update failed.'])->withInput();
            }
        } catch (\Exception $e) {
            \Log::error('Error updating profile: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }

    // delete profile
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
}
