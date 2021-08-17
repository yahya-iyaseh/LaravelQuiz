<?php

namespace App\Http\Middleware;
use App\Models\User;
use Closure;
// use App\Http\Middleware\Auth;
use Illuminate\Http\Request;
use Auth;
class isAdmin
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
        if(Auth::user() && Auth::user()->is_admin==1){
            return $next($request);
        }
        return redirect('/login');

    }
}
