<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_workout;
use App\Models\WorkoutExercise;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function listaUsuarios(){
        $usuarios = User::where("rol", null)->get();
        return view('listaUsuarios', ["listaUsuarios" => $usuarios]);
    }

    public function deleteUser(Request $request){
        $userId = $request->id;
        User_workout::where('user_id', $userId)->delete();
        User::where("id", $userId)->delete();
        $usuarios = User::where("rol", null)->get();
        return view('listaUsuarios', ["listaUsuarios" => $usuarios]);
    }
    

    public function cantidadEjerciciosMusculo()
    {
        $muscleGroups = ['Pecho', 'Espalda', 'Triceps', 'Biceps', 'Hombro', 'Pierna'];
        $data = [];

        foreach ($muscleGroups as $muscleGroup) {
            $count = WorkoutExercise::whereIn('exercise_id', function($query) use ($muscleGroup) {
                $query->select('id')
                      ->from('exercises')
                      ->where('muscle_group', $muscleGroup);
            })->count();

            $data[$muscleGroup] = $count;
        }

        return view('cantidadEjerciciosMusculo', ['data' => $data]);
    }
}

