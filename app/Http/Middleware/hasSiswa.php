<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class hasSiswa
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
        if (Auth::check() && Auth::user()->level==0 && Auth::user()->status==1) {
            return $next($request);    
        }
        else {
            Auth::logout();
            return redirect('/login-form')->with('log','Login Dolo Sana');
        }
    }
}
