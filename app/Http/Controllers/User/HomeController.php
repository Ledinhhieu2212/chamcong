<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user_account = Auth::user();
        return view('user.home.index' , compact('user_account'));
    }
}
