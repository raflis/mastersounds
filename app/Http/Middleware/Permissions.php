<?php

namespace App\Http\Middleware;

use Closure, Auth, Route;
use Illuminate\Http\Request;

class Permissions
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
        if(validatePermission(Route::currentRouteName(), Auth::user()->permissions) == true):
            return $next($request);
        else:
            return redirect()->route('admin');
        endif;
    }
}
