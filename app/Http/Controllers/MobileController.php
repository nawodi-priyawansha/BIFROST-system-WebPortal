<?php

namespace App\Http\Controllers;

use App\Models\ClientManagement;
use Exception;
use Carbon\Carbon;
use App\Models\Score;
use App\Models\UserScore;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MobileController extends Controller
{
    //
    public function login()
    {
        return view("mobile.auth.login");
    }
    public function forgetpin()
    {
        return view("mobile.auth.forgetpin");
    }

    // Training Day view
    public function trainingday(Request $request)
    {
        // Check if 'selected_day' is null and store today's date if it is
        if (!Session::has('selected_day')) {
            session(['selected_day' => Carbon::now()->format('d/m/Y')]);
        }

        $dates = [];
        $startOfWeek = Carbon::now()->startOfWeek(); // Get Monday

        for ($i = 0; $i < 7; $i++) {
            $dates[] = $startOfWeek->copy()->addDays($i)->format('d/m/Y');
        }

        // Get the selected day from the session
        $selectedDay = session('selected_day');

        return view("mobile.user.trainingday", compact('dates', 'selectedDay'));
    }

    // Training Day select date
    public function selectday(Request $request)
    {
        // Retrieve the day from the request
        $day = $request->day;

        // Store the day in the session
        session(['selected_day' => $day]);

        // Retrieve the day from the session
        $storedDay = session('selected_day');

        // Return the day from the session as a JSON response
        return response()->json(['day' => $storedDay]);
    }

    // Readinessscore page view
    public function readinessscore()
    {
        // Retrieve the day from the session
        $storedDay = session('selected_day');

        // Format the stored day to the desired format
        $date = Carbon::createFromFormat('d/m/Y', $storedDay);
        $dayName = $date->format('l'); // Get the full day name (e.g., Monday)
        $formattedDate = $date->format('d/m/Y'); // Format the date

        // Combine day name and date
        $dayWithDate = $dayName . ' ' . $formattedDate;
        $user = Auth::user()->id;

        $userscore = UserScore::where('user_id', $user)->where('selected_day', $dayWithDate)->first();
        // dd($userscore);

        return view("mobile.user.readinessscore", compact('dayWithDate','userscore'));
    }

    // store Score
    public function storescore(Request $request)
    {
        $validatedData = $request->validate([
            'selected_day' => 'required|string',
            'sleep_input' => 'required|string',
            'alertness_input' => 'required|string',
            'excitement_input' => 'required|string',
            'stress_input' => 'required|string',
            'soreness_input' => 'required|string',
            'score' => 'required|integer',
        ]);

        $user = $request->user();

        // Find an existing score for the same user and date, or create a new one
        $score = $user->scores()->updateOrCreate(
            ['user_id' => $user->id, 'selected_day' => $validatedData['selected_day']],
            $validatedData
        );

        return redirect()->route('mobile.workout')->with('success', 'Score saved successfully.');
    }


    public function workout()
    {
        $storedDay = session('selected_day');

        // Format the stored day to the desired format
        $date = Carbon::createFromFormat('d/m/Y', $storedDay);
        $dayName = $date->format('l'); // Get the full day name (e.g., Monday)
        $formattedDate = $date->format('d/m/y'); // Format the date

        // Combine day name and date
        $dayWithDate = $formattedDate . ' ' . $dayName;

        //get warup details for specific date
        $tabwarmup = 'warmup';
        $date = $dayWithDate;
        $detailswarmup = ClientManagement::where('tab', $tabwarmup)
            ->where('date', $dayWithDate)
            ->with('workouts')
            ->get();


        //get warup details for specific date
        $tabstrength = 'strength';
        $date = $dayWithDate;
        $detailsstrength = ClientManagement::where('tab', $tabstrength)
            ->where('date', $date)
            ->with('workouts')
            ->get();

         //get warup details for specific date
         $tabconditioning = 'conditioning';
         $date = $dayWithDate;
         $detailsconditioning = ClientManagement::where('tab', $tabconditioning)
             ->where('date', $date)
             ->with('workouts')
             ->get();

         //get warup details for specific date
         $tabweightweight = 'weightlifting';
         $date = $dayWithDate;
         $detailsweight = ClientManagement::where('tab', $tabweightweight)
             ->where('date', $date)
             ->with('workouts')
             ->get();

        return view('mobile.user.workout', compact('dayWithDate','detailswarmup','detailsstrength','detailsconditioning','detailsweight'));
    }

    public function workouttimer()
    {
        return view("mobile.user.workout-timer");
    }

    public function histroyview()
    {
        return view("mobile.user.history");
    }
}
