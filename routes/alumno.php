<?php

use App\Http\Controllers\Alumno\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Alumno\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Alumno\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Alumno\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Alumno\Auth\NewPasswordController;
use App\Http\Controllers\Alumno\Auth\PasswordResetLinkController;
use App\Http\Controllers\Alumno\Auth\RegisteredUserController;
use App\Http\Controllers\Alumno\Auth\VerifyEmailController;
use App\Http\Controllers\Alumno\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('alumno')->name('alumno.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth:alumno');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth:alumno')
        ->name('dashboard');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:alumno')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:alumno');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:alumno')
        ->name('logout');
});

