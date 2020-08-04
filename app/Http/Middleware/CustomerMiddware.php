<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CustomerMiddware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $guard = 'cus')
    {
       if (Auth::guard($guard)->check()) {
            return redirect()->route('fontend.sign_in');
        }

        return $next($request);
    }
}
