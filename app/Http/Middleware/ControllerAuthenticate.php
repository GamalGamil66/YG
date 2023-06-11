<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class ControllerAuthenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('my_controller.login');
        }
    }

    protected function authenticate($request, array $guards)
    {        
        if ($this->auth->guard('my_controller')->check()) {
            return $this->auth->shouldUse('my_controller');
        }

        $this->unauthenticated($request, ['my_controller']);
    }
}
