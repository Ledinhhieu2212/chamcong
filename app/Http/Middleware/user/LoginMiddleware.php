<?php

namespace App\Http\Middleware\user;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
