<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedacteurVerification
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
        if(Auth::user()->roles->role=='admin' || Auth::user()->roles->role=='webmaster' || Auth::user()->roles->role=='redacteur'){
            return $next($request);
        }else{
            return redirect('/welcome');
        };
    }
}
