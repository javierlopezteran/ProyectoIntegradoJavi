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
        Schema::create('routine_exercises', function (Blueprint $table) {
            $table->id();
            $table->integer("sets")->nullable();
            $table->integer("reps")->nullable();
            $table->integer("default_weight")->nullable();
            $table->unsignedBigInteger('routine_id');
            $table->foreign('routine_id')->references("id")->on("routines");
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
        Schema::dropIfExists('routine_exercises');
    }
};
