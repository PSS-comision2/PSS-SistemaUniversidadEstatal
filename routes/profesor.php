<?php

use App\Http\Controllers\Profesor\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Profesor\DashboardController;
use App\Http\Controllers\ExamenFinalController;
use App\Http\Controllers\CursadosController;
use Illuminate\Support\Facades\Route;

Route::prefix('profesor')->name('profesor.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:profesor');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:profesor')
        ->name('dashboard');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:profesor')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:profesor');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:profesor')
        ->name('logout');

    Route::get('/finales', [ExamenFinalController::class, 'index'])
        ->middleware('auth:profesor')
        ->name('finales');

    Route::get('/cursados', [CursadosController::class, 'index'])
        ->middleware('auth:profesor')
        ->name('cursados');

    Route::get('/cargarnotascursados/{id}', [CursadosController::class, 'edit'])
        ->middleware('auth:profesor')
        ->name('cargarnotascursados');

    Route::put('/cargarnotascursados/{id}', [CursadosController::class, 'update'])
        ->middleware('auth:profesor')
        ->name('cargarnotascursados');

    Route::get('/cargarnotasfinal/{id}', [ExamenFinalController::class, 'edit'])
        ->middleware('auth:profesor')
        ->name('cargarnotasfinal');

    Route::put('/cargarnotasfinal/{id}', [ExamenFinalController::class, 'update'])
        ->middleware('auth:profesor')
        ->name('cargarnotasfinal');
});
