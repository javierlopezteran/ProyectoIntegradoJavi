<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineExercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'routine_id',
        'exercise_id',
        'sets',
        'reps',
        'default_weight'
    ];
    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
    public static function edit($data)
    {
        // dd($data);
        
        $routineId = $data['id'];
        // dd($routineId);
        foreach ($data['series'] as $exerciseId => $sets) {
        // dd($exerciseId);

            $routineExercise = static::where("routine_id", $routineId)->where("exercise_id", $exerciseId)->first();
            // dd($routineExercise);
            if ($routineExercise) {
                

                
                $routineExercise->sets = $sets;
                $routineExercise->reps = $data['repetitions'][$exerciseId];
                $routineExercise->default_weight = $data['weight'][$exerciseId];
                $routineExercise->save();
            }
        }
    }
}
