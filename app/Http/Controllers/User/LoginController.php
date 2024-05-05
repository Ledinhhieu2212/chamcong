<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Detail_QrCode;
use App\Models\Qrcode;
use App\Models\timekeep;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.home');
        }
        return view('user.auth.login');
    }
    public function login(AuthRequest $request)
    {
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.home');
        }
        return redirect()->route('user.index')->with('error', 'Email/Username hoặc mật khẩu không chính xác');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.index');
    }
}
