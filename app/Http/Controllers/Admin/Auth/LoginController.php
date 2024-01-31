<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }
        return view('admin.auth.login');
    }
    public function loginPost(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login')->with('error', 'Email/Username hoặc mật khẩu không chính xác');


    }

    public function logout(Request $request)
    {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect()->route('admin.login');
    }
}
