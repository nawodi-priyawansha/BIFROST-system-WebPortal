<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warmup extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'workout_id',
        'reps',
        'weight',
        'date'
    ];
}
