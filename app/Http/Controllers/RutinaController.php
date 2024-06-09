<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Routine;
use App\Models\RoutineExercise;
use App\Models\UserRoutine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RutinaController extends Controller
{
    public function init()
    {
        $exercises = Exercise::all();
        $userRoutines = UserRoutine::where('user_id', Auth::user()->id)->get();
        $routines = [];
        $routineExercises = [];
        foreach ($userRoutines as $userRoutine) {
            $routines[] = $userRoutine->routine;
            foreach ($userRoutine->routine->routineExercise as $routineExercise) {
                
                $routineExercises[$userRoutine->routine->id][] = $routineExercise->exercise;
            }
        }
        // dd($routineExercises);
        return view('rutinas', ['exercises' => $exercises, 'routines' => $routines, 'routineExercises'=>$routineExercises]);
    }

    public function create()
    {
        return route('rutinas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        $routine = Routine::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        UserRoutine::create([
            'user_id' => Auth::user()->id,
            'routine_id' => $routine->id,
        ]);

        return redirect()->route('rutinas')->with('success', 'Rutina creada exitosamente');
    }

    public function addExercises(Request $request)
    {
        foreach ($request["exercises"] as $exercise) {
            RoutineExercise::create([
                'routine_id' => $request->id, 
                'exercise_id' => $exercise,
                'sets'=>3,
                'reps'=>8,
                'default_weight'=>2

            ]);
        }

        return redirect()->route('rutinas')->with('success', 'Ejercicios añadidos a la rutina exitosamente');
    }

    public function delete(Request $request)
    {
        // @dd($request);
        RoutineExercise::where("routine_id", $request->id)->delete();
        UserRoutine::where("routine_id", $request->id)->first()->delete();
        Routine::find($request->id)->delete();


        return redirect()->route('rutinas');
    }

    
}
