<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $check)
    {
        if(!Auth::user()||Auth::user()->role->user != $check){
            return redirect()->route('login');
        }
        // echo Auth()->user()->role->user;
        return $next($request);
    }
}
