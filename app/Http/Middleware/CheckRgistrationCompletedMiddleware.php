<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRgistrationCompletedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(is_null(auth()->user()->Username)
        &&is_null(auth()->user()->Job_title)
        &&is_null(auth()->user()->education)
        &&is_null(auth()->user()->Date)
        &&is_null(auth()->user()->Gender)
        &&is_null(auth()->user()->role)){
        return redirect()->route('register-step2.create');
        }
        return $next($request);
    }
}
