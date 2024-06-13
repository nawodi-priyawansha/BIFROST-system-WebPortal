<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\CategoryOption;
use App\Models\WorkoutLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutLibraryController extends Controller
{
    //
    public function viewworkoutlibrary()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

        // Fetch the access record for the user
        $access = Access::where('user_id', $userId)->first();
        $categoryOptions = CategoryOption::all();
        $workoutLibraries = WorkoutLibrary::all();

        if ($access && $access->workout_library === 'enable') {
            // Pass the access type to the view using compact
            $accessType = $access->access_type;
            return view('admin.user.workout_library', compact('accessType', 'categoryOptions', 'workoutLibraries'));
        } else {
            // Redirect to an unauthorized access view
            return view('error.unauthorized');
        }
    }

    public function listworkoutlibrary(Request $request)
    {
        // dd($request);
        // Validate the request data
        $request->validate([
            'category' => 'required|exists:category_options,id',
            'type' => 'required|string',
            'workout' => 'required|string',
            'link' => 'required|url',
        ]);

        // Create a new workout library entry
        WorkoutLibrary::create([
            'category_options_id' => $request->input('category'),
            'type' => $request->input('type'),
            'workout' => $request->input('workout'),
            'link' => $request->input('link'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Workout library entry added successfully!');
    }


    public function delete($id)
    {
        // Find the workout library entry
        $workoutLibrary = WorkoutLibrary::findOrFail($id);

        // Delete the entry
        $workoutLibrary->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Workout library entry deleted successfully!');
    }


    public function edit($id)
    {
        $workoutLibrary = WorkoutLibrary::findOrFail($id);

        // You may adjust this response based on your data structure
        return response()->json([
            'category_id' => $workoutLibrary->categoryOption->category_name,
            'type' => $workoutLibrary->type,
            'workout' => $workoutLibrary->workout,
            'link' => $workoutLibrary->link,
        ]);
    }
}
