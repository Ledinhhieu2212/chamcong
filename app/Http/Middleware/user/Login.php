<?php

namespace App\Http\Middleware\user;

use App\Models\User;
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
        if (!Auth::guard('web')->check()) {
            return redirect()->route('user.login')->with('error', 'Bạn phải đăng nhập trước khi sử dụng');
        } else {
            view()->share("auth", Auth::guard('web')->user());
            return $next($request);
        }
    }
}
