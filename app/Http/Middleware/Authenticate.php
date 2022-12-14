<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if(! $request->expectsJson() && $request->is('alumno*')) {
            return route('alumno.login');
        }
        if(! $request->expectsJson() && $request->is('profesor*')) {
            return route('profesor.login');
        }
        if(! $request->expectsJson() && $request->is('administrador*')) {
            return route('administrador.login');
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
