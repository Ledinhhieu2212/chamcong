<?php

namespace App\Http\Middleware\admin;

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
        if (!Auth::guard('admins')->check()) {
            return redirect()->route('admin.login')->with('error', 'Bạn phải đăng nhập trước khi sử dụng');
        } else {
            view()->share("user_account", Auth::guard('admins')->user());
            return $next($request);
        }
    }
}
