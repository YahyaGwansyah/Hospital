<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $userType = Auth::user()->usertype;

        if($userType == 'admin') {
            return $next($request);
        }

        if($userType == 'doctor') {
            return redirect()->route('doctor/dashboard');
        }
     
        elseif($userType == 'user') {
            return redirect()->route('dashboard');
        }
    }
}
