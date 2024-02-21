<?php

namespace App\Http\Middleware\admin;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::guard('admin')->check()){
            return redirect()->route('login')->with('error', 'Bạn phải đăng nhập trước khi sử dụng');;
        }else{
            view()->share('admin', Auth::guard('admin')->user());
            view()->share('users_array', User::all());
            return $next($request);
        }
    }
}
