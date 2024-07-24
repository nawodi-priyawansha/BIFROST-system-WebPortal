<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Access;
use App\Models\Warmup;
use Illuminate\Http\Request;
use App\Models\WorkoutLibrary;
use App\Models\ClientManagement;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //
    public function viewsession()
    {
        $userId = Auth::id(); // Get the currently authenticated user's ID

         // Fetch the access record for the user
         $access = Access::where('user_id', $userId)->first();

         if ($access && $access->session === 'enable')
        {
             // Pass the access type to the view using compact
             $accessType = $access->access_type;
             return view('admin.user.session', compact('accessType'));
        }
        else
        {
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
         $workouts = WorkoutLibrary::where('type', 'warmup')
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
 
         return response()->json(['result' => $result, 'categoryOptions' => $categoryOptions]);
     }
}
