<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function routines()
    {
        return $this->belongsToMany(Routine::class, 'routine_exercise');
    }
    public function routinesExercises()
    {
        return $this->hasMany(RoutineExercise::class, 'routine_exercise');
    }
    public function workoutExercises()
    {
        return $this->hasMany(WorkoutExercise::class);
    }
}
