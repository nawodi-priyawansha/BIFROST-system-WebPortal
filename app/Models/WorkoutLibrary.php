<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutLibrary extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_options_id',
        'type',
        'workout',
        'link',
    ];

    public function categoryOption()
    {
        return $this->belongsTo(CategoryOption::class, 'category_options_id');
    }
}
