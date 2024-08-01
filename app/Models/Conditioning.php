<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conditioning extends Model
{
    use HasFactory;
     // Specify the fields that are mass assignable
     protected $fillable = [
        'rounds',
        'category_id',
        'workout_id',
        'reps',
        'time_to_complete',
        'weight',
        'date',
        'unit', 
        'amrap',
    ];
    public function category()
    {
        return $this->belongsTo(CategoryOption::class);
    }

    // Define the relationship with the WorkoutLibrary model
    public function workout()
    {
        return $this->belongsTo(WorkoutLibrary::class, 'workout_id');
    }
}
