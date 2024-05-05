<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        // view()->share("user_account", Auth::user());
    }
    public function index()
    {
        $user = Auth::guard('web')->user();
        $title = "Trang chủ";
        
        return view('user.home.index' ,compact('title'));
    }
}
