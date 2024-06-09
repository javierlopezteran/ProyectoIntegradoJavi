<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\RoutineExercise;
use App\Models\User_workout;
use App\Models\UserRoutine;
use App\Models\Workout;
use App\Models\WorkoutExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionController extends Controller
{
    public function sesiones()
    {
        // dd(Auth::user());
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
        return view('regSession', ['exercises' => $exercises, 'routines' => $routines, 'routineExercises' => $routineExercises]);
    }

    public function registerSesion(Request $request)
{
    // dd($request);

    // Crear el array $workout con los datos necesarios
    $workout = [
        'date' => $request["fechaEntrenamiento"],
        'duration' => null,
        'notes' => $request->notas
    ];

    // dd($workout);

    // Crear el workout con los datos proporcionados
    $id = Workout::create($workout)->id;

    // Llamar al método para crear las relaciones con los ejercicios
    WorkoutExercise::crearEntrenamiento($request, $id);

    // Crear la relación con el usuario
    $user_id = [
        "user_id" => Auth::user()->id,
        "workout_id" => $id
    ];
    User_workout::create($user_id);

    // Obtener los datos necesarios para volver a cargar la vista
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

    // Volver a cargar la vista con los datos actualizados
    return view('regSession', [
        'exercises' => $exercises,
        'routines' => $routines,
        'routineExercises' => $routineExercises
    ]);
}


    public function historial()
{
    $exercises = Exercise::all();
    $workouts = User_Workout::where('user_id', Auth::user()->id)
                ->with(['workout.workoutExercise.exercise'])
                ->get();

    $workoutsAr = [];
    foreach ($workouts as $value) {
        $workoutDetails = $value->workout;
        $workoutsAr[$workoutDetails->date] = $workoutDetails;
    }

    krsort($workoutsAr);

    $userRoutines = UserRoutine::where('user_id', Auth::user()->id)->get();
    $routines = [];
    $routineExercises = [];

    foreach ($userRoutines as $userRoutine) {
        $routines[] = $userRoutine->routine;
        foreach ($userRoutine->routine->routineExercise as $routineExercise) {
            $routineExercises[$userRoutine->routine->id][] = $routineExercise->exercise;
        }
    }

    return view('historial', [
        'exercises' => $exercises,
        'workoutsAr' => $workoutsAr,
        'routines' => $routines,
        'routineExercises' => $routineExercises
    ]);
}
}
