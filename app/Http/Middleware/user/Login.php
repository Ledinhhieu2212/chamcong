<?php

namespace App\Http\Middleware\user;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('users')->check()) {
            return redirect()->route('user.login')->with('error', 'Bạn phải đăng nhập trước khi sử dụng');
        } else {
            view()->share("user_account", Auth::user());
            return $next($request);
        }
    }
}
