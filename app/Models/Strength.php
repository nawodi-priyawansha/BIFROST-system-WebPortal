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

    public function category()
    {
        return $this->belongsTo(CategoryOption::class, 'category_id');
    }

    public function workout()
    {
        return $this->belongsTo(WorkoutLibrary::class, 'workout_id');
    }

    public function setstrengthsetsreps()
    {
        return $this->hasMany(StrengthSetRep::class, 'strength_id');
    }

    public function altCategory()
    {
        return $this->belongsTo(CategoryOption::class, 'alt_category_id');
    }

    public function altWorkout()
    {
        return $this->belongsTo(WorkoutLibrary::class, 'alt_workout_id');
    }
    public static function store($data)
    {

        // dd($data);
        $strengthing = new self();
        $strengthing->category_id = $data['categorys'];
        $strengthing->workout_id = $data['workouts'];
        $strengthing->weight = $data['weigths'];
        $strengthing->rest = $data['rests'] ?? '00:00:00'; // Use default if not provided
        $strengthing->intensity = $data['intensitys'];
        $strengthing->alt_category_id = $data['alt-categorys'];
        $strengthing->alt_workout_id = $data['alt-workouts'];
        $strengthing->altweight = $data['alt-weigths'];
        $strengthing->altrest = $data['alt-rests'] ?? '00:00:00'; // Use default if not provided
        $strengthing->altintensity = $data['alt-intensitys'];
        $strengthing->date = $data['date'];

        // Save the model to the database
        $strengthing->save();

        return $strengthing;
    }
    public function sets()
    {
        return $this->hasMany(StrengthSetRep::class, 'strength_id');
    }
}

