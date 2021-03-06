<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect()->route('admin.dashboard');
        }
        if ($guard == "merchents" && Auth::guard($guard)->check()) {
            return redirect()->route('merchent.dashboard');
        }
        if (Auth::guard($guard)->check()) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
