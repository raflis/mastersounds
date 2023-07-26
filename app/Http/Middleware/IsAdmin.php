<?php

namespace App\Http\Middleware;

use Closure, Auth;
use Illuminate\Http\Request;

class IsAdmin
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
        return $next($request);

        // no hay niveles de usuarios a nivel front
        if(Auth::user()->role=="0"):
            return $next($request);
        else:
            return redirect()->route('login.index');
        endif;
    }
}
