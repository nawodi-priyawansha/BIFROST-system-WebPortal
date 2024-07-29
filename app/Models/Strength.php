<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strength extends Model
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
        'alt_category_id',
        'alt_workout_id',
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

    public function setstrength(){
        return $this->hasMany(Strength::class);
    }
}
