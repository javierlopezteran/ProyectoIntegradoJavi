<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'workout_id',
    ];

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }










    
}

