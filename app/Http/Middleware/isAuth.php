<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isAuth
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
        if (Auth::check()) {
            if ($request->segment(1)=="login-form" && Auth::user()->level==0) {
                return redirect('/dashboard-siswa');
            }
            else if ($request->segment(1)=="login-form" && Auth::user()->level==1) {
                return redirect('/dashboard-petugas');
            }
            else if ($request->segment(1)=="login-form" && Auth::user()->level==2) {
                return redirect('/dashboard-admin');
            }
        }
        return $next($request);
    }
}
