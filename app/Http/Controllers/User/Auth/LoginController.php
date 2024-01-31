<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('user.auth.login');
    }
    public function loginPost(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
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
