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

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest:profesor')
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest:profesor');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:profesor')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:profesor');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:profesor')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:profesor')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest:profesor')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:profesor')
        ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth:profesor')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth:profesor', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:profesor', 'throttle:6,1'])
        ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth:profesor')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth:profesor');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:profesor')
        ->name('logout');
});
