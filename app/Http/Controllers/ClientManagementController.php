<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Access;
use Illuminate\Http\Request;
use App\Models\WorkoutLibrary;
use App\Models\ClientManagement;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ClientManagementController extends Controller
{
    public function viewClientManagement()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

        // Fetch the access record for the user
        $access = Access::where('user_id', $userId)->first();

        if ($access && $access->client_management === 'enable') {
            // Pass the access type to the view using compact
            $accessType = $access->access_type;
            return view('admin.user.client_management', compact('accessType'));
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
            $clientManagement->rest = $data['rest'] ?? null;
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
    public function update (Request $request)
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
}
