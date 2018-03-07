<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class validstudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'student')
    {
        if (Auth::guard($guard)->user()->status!='active') {
//                Auth::guard($guard)->logout();
            return redirect('/student/blocked');
        }

        return $next($request);
    }
}
