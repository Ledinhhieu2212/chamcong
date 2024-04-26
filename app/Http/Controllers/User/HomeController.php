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
        return view('user.home.index');
    }
}
