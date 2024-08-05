<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyWarmup extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'warmup_id'
    ];
}
