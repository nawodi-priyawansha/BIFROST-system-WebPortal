<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutLibraryController extends Controller
{
    //
    public function viewworkoutlibrary(){
        return view("admin.user.workout_library");
    }
}
