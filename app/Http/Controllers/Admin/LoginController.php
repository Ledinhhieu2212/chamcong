<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('admins')->check()) {
            return redirect()->route('admin.home');
        }
        return view('admin.auth.login');
    }
    public function login(AuthRequest $request)
    {
        $admin = Admin::where('email', $request->username)->first();
        if(!$admin){
            $credentials = [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ];
        }else{
            $credentials = [
                'email' => $request->input('username'),
                'password' => $request->input('password'),
            ];
        }
        if (Auth::guard("admins")->attempt($credentials)) {
            return redirect()->route('admin.home')->with('success', 'Đăng nhập thành công tài khoản');
        }
        return redirect()->route('admin.login')->with('error', 'Email/Username hoặc mật khẩu không chính xác');
    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}
