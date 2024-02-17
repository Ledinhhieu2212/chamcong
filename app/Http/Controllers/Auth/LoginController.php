<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }
    public function loginPost(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        $decentralization = $request->get('decentralization');
        if ($decentralization == 'user') {
            if (Auth::attempt($credentials)) {
                return redirect()->route('home');
            }
        }
        if ($decentralization == 'admin') {
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('admin.home');
            }
        }
        return redirect()->route('login')->with('error', 'Email/Username hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
