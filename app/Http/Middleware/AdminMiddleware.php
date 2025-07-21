<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  
         $response = $next($request);

        if(isset(Auth::user()->role_id) && Auth::user()->role_id>1 || (empty(Auth::user()))){
            \Session::flash("admin_error","Un-Authorized Access");
            return redirect('/');
        }

        return $response;
    }
}
