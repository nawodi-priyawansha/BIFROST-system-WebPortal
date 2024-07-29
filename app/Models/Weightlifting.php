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
        'rest',
        'intensity',
        'alt_category_id',
        'alt_workout_id',
        'alt_weight',
        'alt_rest',
        'alt_intensity',
        'date',
    ];
    
    public function sets()
    {
        return $this->hasMany(WeightliftingSet::class);
    }

    public static function store($data)
    {
        // dd($data);
        $weightlifting = new self();
        $weightlifting->category_id = $data['category'];
        $weightlifting->workout_id = $data['workout'];
        $weightlifting->weight = $data['weigth'];
        $weightlifting->rest = $data['rest'] ?? '00:00:00'; // Use default if not provided
        $weightlifting->intensity = $data['intensity'];
        $weightlifting->alt_category_id = $data['alt-category'];
        $weightlifting->alt_workout_id = $data['alt-workout'];
        $weightlifting->alt_weight = $data['alt-weigth'];
        $weightlifting->alt_rest = $data['alt-rest'] ?? '00:00:00'; // Use default if not provided
        $weightlifting->alt_intensity = $data['alt-intensity'];
        $weightlifting->date =  $data['date'];

        // Save the model to the database
        $weightlifting->save();

        return $weightlifting;
    }
}
