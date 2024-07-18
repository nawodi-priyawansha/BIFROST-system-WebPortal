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
        'sets',
        'reps',
        'rest',
        'intensity',
        'date',
        'tab',
        'type',
    ];
    public function workout()
    {
        return $this->belongsTo(WorkoutLibrary::class, 'workout');
    }
}
