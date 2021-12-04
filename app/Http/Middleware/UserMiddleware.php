<?php

namespace App\Http\Middleware;

use App\Http\Livewire\Front\Home;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->user_as == 'user'){
            return $next($request);
        }else{
            return redirect()->route('user.login');
        }
    }
}
