<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientManagement extends Model
{
    use HasFactory;
    protected $table = 'client_managements';

    protected $fillable = [
        'category',
        'workout',
        'reps',
        'reps_per_set',
        'rest',
        'intensity',
        'date',
        'tab',
    ];
    public function workouts()
    {
        return $this->belongsTo(WorkoutLibrary::class, 'workout');
    }
}
