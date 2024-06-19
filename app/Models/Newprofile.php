<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newprofile extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'name',
        'nickname',
        'dob',
        'gender',
        'age',
        'phone',
        'email',
        'address',
        'height',
        'weight',
        'bmr',
        'primary-goal',
        'subscription-level',
        'profile_image',
        'user_id'
    ];

    public function getProgressPhotosAttribute($value)
    {
        return json_decode($value, true);
    }

    // Mutator to encode the progress_photos attribute to JSON
    public function setProgressPhotosAttribute($value)
    {
        $this->attributes['progress_photos'] = json_encode($value);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
