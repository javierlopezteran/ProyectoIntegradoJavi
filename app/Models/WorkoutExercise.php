<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutExercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'workout_id',
        'exercise_id',
        'sets',
        'reps',
        'weight',
        'duration',
    ];

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public static function crearEntrenamiento($data, $id)
    {
        foreach ($data['series'] as $exerciseId => $sets) {
            $workoutExercise = new static;
            $workoutExercise->sets = $sets;
            $workoutExercise->reps = $data['repetitions'][$exerciseId];
            $workoutExercise->weight = $data['weight'][$exerciseId];
            $workoutExercise->workout_id = $id;
            $workoutExercise->exercise_id = $exerciseId;
            $workoutExercise->save();
        }
    }
}

