<?php

use App\Http\Controllers\Administrador\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Administrador\DashboardController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ExamenFinalController;
use App\Http\Controllers\MateriaCarreraController;
use App\Http\Controllers\MateriaCorrelativaController;
use App\Http\Controllers\DictaController;
use Illuminate\Support\Facades\Route;

Route::prefix('administrador')->name('administrador.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:administrador');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:administrador')
        ->name('dashboard');

    Route::get('/cargarcarrera', [CarreraController::class, 'create'])
        ->middleware('auth:administrador')
        ->name('cargarcarrera');

    Route::post('/cargarcarrera', [CarreraController::class, 'store'])
        ->middleware('auth:administrador')
        ->name('cargarcarrera');

    Route::get('/cargarmateria', [MateriaController::class, 'create'])
        ->middleware('auth:administrador')
        ->name('cargarmateria');

    Route::post('/cargarmateria', [MateriaController::class, 'store'])
        ->middleware('auth:administrador')
        ->name('cargarmateria');

    Route::get('/cargarprofesor', [ProfesorController::class, 'create'])
        ->middleware('auth:administrador')
        ->name('cargarprofesor');

    Route::post('/cargarprofesor', [ProfesorController::class, 'store'])
        ->middleware('auth:administrador')
        ->name('cargarprofesor');

    Route::get('/cargaralumno', [AlumnoController::class, 'create'])
        ->middleware('auth:administrador')
        ->name('cargaralumno');

    Route::post('/cargaralumno', [AlumnoController::class, 'store'])
        ->middleware('auth:administrador')
        ->name('cargaralumno');

    Route::get('/cargarexamenfinal', [ExamenFinalController::class, 'create'])
        ->middleware('auth:administrador')
        ->name('cargarexamenfinal');

    Route::post('/cargarexamenfinal', [ExamenFinalController::class, 'store'])
        ->middleware('auth:administrador')
        ->name('cargarexamenfinal');

    Route::get('/cargarmateriacarrera', [MateriaCarreraController::class, 'create'])
        ->middleware('auth:administrador')
        ->name('cargarmateriacarrera');

    Route::post('/cargarmateriacarrera', [MateriaCarreraController::class, 'store'])
        ->middleware('auth:administrador')
        ->name('cargarmateriacarrera');

    Route::get('/materiacorrelativa', [MateriaCorrelativaController::class, 'index'])
        ->middleware('auth:administrador')
        ->name('materiacorrelativa');

    Route::get('/cargarcorrelativas/{id}/{id_materia}', [MateriaCorrelativaController::class, 'edit'])
        ->middleware('auth:administrador')
        ->name('cargarcorrelativas');

    Route::put('/cargarcorrelativas/{id}/{id_materia}', [MateriaCorrelativaController::class, 'update'])
        ->middleware('auth:administrador')
        ->name('cargarcorrelativas');

    Route::get('/mostrarfinales', [ExamenFinalController::class,'show'])
        ->middleware('auth:administrador')
        ->name('mostrarfinales');

    Route::get('/mostrarprofesores', [ProfesorController::class,'show'])
        ->middleware('auth:administrador')
        ->name('mostrarprofesores');

    Route::get('/mostraralumnos', [AlumnoController::class,'show'])
        ->middleware('auth:administrador')
        ->name('mostraralumnos');
    Route::get('/mostrarmaterias', [DictaController::class,'show'])
        ->middleware('auth:administrador')
        ->name('mostrarmaterias');

    Route::get('/mostrarcarreras', [CarreraController::class,'show'])
        ->middleware('auth:administrador')
        ->name('mostrarcarreras');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:administrador')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:administrador');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:administrador')
        ->name('logout');
});
