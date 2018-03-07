<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ValidTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = 'teacher')
    {
        if (!Auth::guard($guard)->user()->status==0) {
//            Auth::guard($guard)->logout();
            return view('blocked');
        }
        return $next($request);
    }
}
