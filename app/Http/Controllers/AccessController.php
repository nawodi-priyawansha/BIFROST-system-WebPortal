<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\User;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    // view admin access page
    public function viewaccess()
    {
        // Fetch the first 5 users with their access types
        $users = User::join('accesses', 'users.id', '=', 'accesses.user_id')
            ->select('users.*', 'accesses.*')
            ->whereIn('users.user_type', ['admin', 'super admin'])
            ->orderBy('accesses.id', 'asc')
            ->take(5)
            ->get();

        // dd($users);
        return view('admin.user.access', compact('users'));
    }

    // update user name and email
    public function setData(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $id = $request->input('id');

        $access = Access::find($id);

        if (!$access) {
            return response()->json([
                'message' => 'Access record not found'
            ], 404);
        }

        $user = User::find($access->user_id);

        if ($user) {
            // Update user's name and email
            $user->name = $name;
            $user->email = $email;
            $user->save(); // Save the changes

            return response()->json([
                'message' => 'User updated successfully',
                'user' => $user
            ]);
        } else {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    }

    // delete user
    public function deleteData(Request $request)
    {
        $id = $request->input('id');
        $access = Access::find($id);

        if (!$access) {
            return response()->json([
                'message' => 'Access record not found'
            ], 404);
        }

        $user = User::find($access->user_id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        // Delete the user
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }

    // reset user pin number
    public function resetPin(Request $request)
    {
        $id = $request->input('id');
        $access = Access::find($id);

        if (!$access) {
            return response()->json([
                'message' => 'Access record not found'
            ], 404);
        }

        $user = User::find($access->user_id);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        // Generate a unique 4-digit random PIN
        do {
            $pin = str_pad(random_int(1000, 9999), 4, '0', STR_PAD_LEFT);
        } while (User::where('pin', $pin)->exists());

        // Assuming you have a 'pin' field in your User model to store the PIN
        $user->pin = $pin;
        $user->save();

        return response()->json([
            'message' => 'PIN reset successfully',
            'pin' => $pin,
            'user' => $user
        ]);
    }
    // update access type
    public function updateAccess(Request $request)
    {
        $id = $request->input('id');
        $accessType = $request->input('access_type');

        $access = Access::find($id);

        if (!$access) {
            return response()->json([
                'message' => 'Access record not found'
            ], 404);
        }

        $access->access_type = $accessType;
        $access->save();

        return response()->json([
            'message' => 'Access type updated successfully',
            // 'access' => $access
        ]);
    }

    //  update access page
    public function updateAccessPage(Request $request)
    {
        // Validate the input
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
        ]);

        $id = $request->input('id');
        $name = $request->input('name');

        $access = Access::find($id);

        if (!$access) {
            return response()->json([
                'message' => 'Access record not found'
            ], 404);
        }

        switch ($name) {
            case 'dashboard':
                $access->dashboard = $access->dashboard === 'enable' ? 'disable' : 'enable';
                break;
            case 'access':
                $access->access = $access->access === 'enable' ? 'disable' : 'enable';
                break;
            case 'client_management':
                $access->client_management = $access->client_management === 'enable' ? 'disable' : 'enable';
                break;
            case 'workout_library':
                $access->workout_library = $access->workout_library === 'enable' ? 'disable' : 'enable';
                break;
            case 'session':
                $access->session = $access->session === 'enable' ? 'disable' : 'enable';
                break;
            case 'financial':
                $access->financial = $access->financial === 'enable' ? 'disable' : 'enable';
                break;
            case 'communication':
                $access->communication = $access->communication === 'enable' ? 'disable' : 'enable';
                break;
            case 'statistics':
                $access->statistics = $access->statistics === 'enable' ? 'disable' : 'enable';
                break;
            case 'user_dashboard':
                $access->user_dashboard = $access->user_dashboard === 'enable' ? 'disable' : 'enable';
            case 'profile':
                $access->profile = $access->profile === 'enable' ? 'disable' : 'enable';
                break;
            case 'goals':
                $access->goals = $access->goals === 'enable' ? 'disable' : 'enable';
                break;
            case 'achievements':
                $access->achievements = $access->achievements === 'enable' ? 'disable' : 'enable';
                break;
            case 'settings':
                $access->settings = $access->settings === 'enable' ? 'disable' : 'enable';
                break;
            default:
                return response()->json([
                    'message' => 'Invalid column name'
                ], 400);
        }

        $access->save();

        return response()->json([
            'message' => 'Access type updated successfully',
            'access' => $access
        ]);
    }

    // next button function
    public function nextShow($id)
    {
        // dd($id);
        $users = User::join('accesses', 'users.id', '=', 'accesses.user_id')
            ->select('users.*', 'accesses.*')
            ->where('accesses.id', '>=', $id)
            ->orderBy('accesses.id', 'asc') // Order by user id in ascending order
            ->take(5)
            ->get();


        // dd($users);
        if ($users->isEmpty()) {
            return redirect()->back();
        }

        return view('admin.user.access', compact('users'));
    }

    // previous button function
    public function previousShow($id)
    {
        $users = User::join('accesses', 'users.id', '=', 'accesses.user_id')
            ->select('users.*', 'accesses.*')
            ->where('accesses.id', '<', $id)
            ->orderByDesc('accesses.id') // Order by accesses id in descending order
            ->take(5)
            ->get();

        if ($users->isEmpty()) {
            return redirect()->route('admindaaccess')->with('error', 'No users found.');
        }

        return view('admin.user.access', compact('users'));
    }
}
