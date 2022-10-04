<?php

namespace App\Http\Controllers\Profesor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user('profesor')->hasVerifiedEmail()
                    ? redirect()->intended(route('profesor.dashboard'))
                    : view('profesor.auth.verify-email');
    }
}
