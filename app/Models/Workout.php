<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'duration',
        'notes',
    ];

    public function workoutExercise()
    {
        return $this->hasMany(WorkoutExercise::class);
    }

    public function userWorkout()
    {
        return $this->hasMany(User_Workout::class);
    }
}
