<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;

//Para hacer que esa ruta solo sea accesible si has iniciado sesión, sino return al login
// ->middleware(['auth', 'verified']);
Route::get('/', HomeController::class)->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Agrupar todas las rutas para que necesite iniciar sesión para acceder a ellas
Route::middleware('auth')->group(function () {
Route::get('/rutinas', [RutinaController::class, 'init'])->name('rutinas');
Route::post('/rutinas', [RutinaController::class, 'store'])->name('rutinas.store');
Route::post('/rutinas/add-exercises', [RutinaController::class, 'addExercises'])->name('rutinas.addExercises');
Route::post('/rutinas/eliminar-rutina', [RutinaController::class, 'delete'])->name('rutina.delete');

Route::get('/sesiones', [SesionController::class, 'sesiones'])->name('regSession');
Route::post('/sesiones/registerSession', [SesionController::class, 'registerSesion'])->name('sesiones.registerSesion');

Route::get('/historial', [SesionController::class, 'historial'])->name('historial');

Route::get('/lista-usuarios', [UsuariosController::class, 'listaUsuarios'])->name("listaUsuarios");
Route::post('/lista-usuarios/deleteUser', [UsuariosController::class, 'deleteUser'])->name("delete.user");

Route::get('/estadisticas', [UsuariosController::class, 'cantidadEjerciciosMusculo'])->name("cantidadEjerciciosMusculo");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
