<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserGoalController extends Controller
{

// view goal function
    public function viewGoal()
    {

        $userId = Auth::id(); // Get the currently authenticated user's ID

        // Fetch the access record for the user
        $access = Access::where('user_id', $userId)->first();

        if ($access && $access->goals === 'enable') {
            // Pass the access type to the view using compact
            $accessType = $access->access_type;

            // Retrieve searched user details from session
            $searchedUser = Session::get('searchedUser');
            //  dd($searchedUser);
            // Check if $searchedUser is an array and convert it to an object if needed
            if (is_array($searchedUser)) {
                $searchedUser = (object) $searchedUser;
            }
            
            if ($searchedUser && isset($searchedUser->id)) {
                $goal = Goal::where('user_id', $searchedUser->id)->first();
                return view('user.user.smart-goal', compact('accessType', 'searchedUser', 'goal'));
            } else {
                // Pass an error message to the view
                $errorMessage = "User not found or unauthorized access.";
                return view('user.user.smart-goal', compact('errorMessage'));
            }
        }
    }

//save function and update function
    public function saveGoal(Request $request)
    {
        // dd($request);
        if (!$request->goal_id) {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'goal_name' => 'required|string',
                'specific' => 'required|string',
                'measurable' => 'required|string',
                'achievable' => 'required|string',
                'relevant' => 'required|string',
                'time_bound' => 'required|string',
            ]);

            $goal = new Goal();
            $goal->user_id = $validatedData['user_id'];
            $goal->goal_name = $validatedData['goal_name'];
            $goal->specific = $validatedData['specific'];
            $goal->measurable = $validatedData['measurable'];
            $goal->achievable = $validatedData['achievable'];
            $goal->relevant = $validatedData['relevant'];
            $goal->time_bound = $validatedData['time_bound'];
            $goal->save();

            return redirect()->route('usergoal')->with('success', 'Goal saved successfully.');
        } else {
            // dd("byyy");
            $id = $request->goal_id;
            $goal = Goal::find($id);

            if ($goal) {
                // Update the desired columns
                $goal->achievable_progress = $request->input('achievable_progress');
                $goal->time_progress = $request->input('time_progress');

                // Save the changes
                $goal->save();

                // Return a response, such as a redirect or a success message
                return redirect()->back()->with('success', 'Goal updated successfully.');
            } else {
                // Handle the case where the goal is not found
                return redirect()->back()->with('error', 'Goal not found.');
            }
        }
        
    }
}
