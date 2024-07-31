<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrengthSetRep extends Model
{

    protected $table = 'strengthsetsreps';

    use HasFactory;
    protected $fillable = [
        'sets',
        'reps',
        'alt_sets',
        'alt_reps',
        'strength_id',
    ];

    public function strengthing()
    {
        return $this->belongsTo(Strength::class,'strength_id');
    }



      /**
     * Store a new WeightliftingSet record.
     *
     * @param array $data
     * @return Strength
     */
    public static function store(array $data)
    {
       
        // dd($data);
        return self::create([
            'sets' => $data[0] ?? null,
            'reps' => $data[1] ?? null,
            'alt_sets' => $data[2] ?? null,
            'alt_reps' => $data[3] ?? null,
            'strength_id' => $data[4] ?? null,
        ]);
    }




    /**
     * Store a new WeightliftingSet record.
     *
     * @param array $data
     * @return StrengthSetRep
     */
    // public static function store(array $data)
    // {

    //     // dd($data);
    //     foreach ($data['sets'] as $index => $set) {
    //         self::create([
    //             'strength_id' => $data['strength_id'],
    //             'sets' => $set ?? null,
    //             'reps' => $data['reps'][$index] ?? null,
    //             'alt_sets' => $data['alt_sets'][$index] ?? null,
    //             'alt_reps' => $data['alt_reps'][$index] ?? null,
    //         ]);
    //     }
    // }
}
