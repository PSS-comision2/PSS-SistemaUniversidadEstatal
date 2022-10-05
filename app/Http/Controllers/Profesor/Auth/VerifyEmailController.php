<?php

namespace App\Http\Controllers\Profesor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated profesor's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user('profesor')->hasVerifiedEmail()) {
            return redirect()->intended(route('profesor.dashboard').'?verified=1');
        }

        if ($request->user('profesor')->markEmailAsVerified()) {
            event(new Verified($request->user('profesor')));
        }

        return redirect()->intended(route('profesor.dashboard').'?verified=1');
    }
}