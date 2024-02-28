<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginTimeKeepQrCodeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view("auth.TimeKeepQrCode");
    }

    public function login(Request $request)
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
}
