<?php

use App\Http\Controllers\Alumno\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Alumno\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RindeController;
use App\Http\Controllers\CursaController;
use App\Http\Controllers\AlumnoController;

Route::prefix('alumno')->name('alumno.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:alumno');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:alumno')
        ->name('dashboard');

    Route::get('/inscribirfinal', [RindeController::class, 'create'])
        ->middleware('auth:alumno')
        ->name('inscribirfinal');

    Route::post('/inscribirfinal', [RindeController::class, 'guardar_alumno_final'])
    ->middleware('auth:alumno')
    ->name('inscribirfinal'); 

    Route::get('/inscribircursada', [CursaController::class, 'create'])
        ->middleware('auth:alumno')
        ->name('inscribircursada');

    Route::post('/inscribircursada', [CursaController::class, 'guardar_alumno_materia'])
        ->middleware('auth:alumno')
        ->name('inscribircursada');

    Route::post('/guardarcarrera', [AlumnoController::class, 'guardar_alumno_carrera'])
        ->middleware('auth:alumno')
        ->name('guardarcarrera');

    Route::get('/inscribircarrera', [AlumnoController::class, 'inscribir_alumno_carrera'])
        ->middleware('auth:alumno')
        ->name('inscribircursada');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:alumno')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:alumno');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:alumno')
        ->name('logout');
});

