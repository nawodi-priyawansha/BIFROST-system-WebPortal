<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weightlifting extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'workout_id',
        'weight',
        'sets',
        'rest',
        'reps',
        'intensity',
        'altweight',
        'altsets',
        'altrest',
        'altreps',
        'altintensity',
        'date'
    ];

    public function workouts()
    {
        return $this->belongsTo(WorkoutLibrary::class, 'workout_id');
    }
}
