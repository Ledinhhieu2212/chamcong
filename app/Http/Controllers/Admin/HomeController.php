<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        return view('admin.home.index', compact('title'));
    }
}
