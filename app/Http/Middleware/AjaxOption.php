<?php

namespace App\Http\Middleware;

use Closure;

class AjaxOption
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request,Closure $next)
    {
        // if ($request->ajax()) {
        //     return $next($request)
        //         ->header('Access-Control-Allow-Origin','*')
        //         ->header('Access-Control-Allow-Methods','GET,POST,OPTIONS');
        // }
        // dd('Maaf Request Gagal');
        if ($request->getMethod() === "OPTIONS") {
            
        }
    }
}
