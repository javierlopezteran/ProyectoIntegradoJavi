<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routine extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
    ];

    public function routineExercise()
    {
        return $this->hasMany(RoutineExercise::class);
    }

    public function userRoutine()
    {
        return $this->hasMany(Userroutine::class);
    }
}
