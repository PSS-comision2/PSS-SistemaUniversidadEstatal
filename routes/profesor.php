<?php

use App\Http\Controllers\Profesor\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Profesor\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Profesor\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Profesor\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Profesor\Auth\NewPasswordController;
use App\Http\Controllers\Profesor\Auth\PasswordResetLinkController;
use App\Http\Controllers\Profesor\Auth\RegisteredUserController;
use App\Http\Controllers\Profesor\Auth\VerifyEmailController;
use App\Http\Controllers\Profesor\DashboardController;
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
});
