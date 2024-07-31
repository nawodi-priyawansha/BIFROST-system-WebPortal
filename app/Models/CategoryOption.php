<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
    ];
    
    public function workout()
    {
        return $this->hasMany(WorkoutLibrary::class);
        
    }
    public function workoutLibrary()
    {
        return $this->belongsTo(WorkoutLibrary::class, 'workout_id');
    }
    
}
