<?php

namespace App\Http\Middleware\user;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn phải đăng nhập trước khi sử dụng');
        }else{
            $weekMap = [
                1 => 'Thứ 2',
                2 => 'Thứ 3',
                3 => 'Thứ 4',
                4 => 'Thứ 5',
                5 => 'Thứ 6',
                6 => 'Thứ 7',
                7 => 'Chủ nhật',
            ];
            $today = [
                'dayOfWeek' => $weekMap[Carbon::now()->dayOfWeek],
                'mothOfYear' => Carbon::now()->format('d/m/Y'),
            ];
            view()->share('today', $today);
            view()->share('user_accoutn', Auth::user());
            view()->share('title', "Tài khoản ".Auth::user()->fullname);
            return $next($request);
        }
    }
}
