<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workout_exercises', function (Blueprint $table) {
            $table->id();
            $table->integer("sets");
            $table->integer("reps");
            $table->integer("weight");
            $table->integer("duration")->nullable();
            $table->unsignedBigInteger('workout_id');
            $table->foreign('workout_id')->references("id")->on("workouts");
            $table->unsignedBigInteger('exercise_id');
            $table->foreign('exercise_id')->references("id")->on("exercises");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_exercises');
    }
};
