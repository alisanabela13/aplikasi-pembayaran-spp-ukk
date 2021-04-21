<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAuth
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
        $role = array_slice(func_get_args(), 2);
        $roleUser = Auth::user()->role;
        
        if(in_array($roleUser, $role)){

            return $next($request);
        }
        abort(403);
    }
}
