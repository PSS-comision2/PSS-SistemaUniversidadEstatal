<?php

use App\Http\Controllers\Administrador\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Administrador\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Administrador\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Administrador\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Administrador\Auth\NewPasswordController;
use App\Http\Controllers\Administrador\Auth\PasswordResetLinkController;
use App\Http\Controllers\Administrador\Auth\RegisteredUserController;
use App\Http\Controllers\Administrador\Auth\VerifyEmailController;
use App\Http\Controllers\Administrador\DashboardController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfesorController;
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

    Route::get('/cargarmateria', [MateriaController::class, 'create'])
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

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:administrador')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:administrador');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:administrador')
        ->name('logout');
});
