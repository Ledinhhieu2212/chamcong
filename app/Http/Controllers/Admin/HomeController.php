<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $title = "Trang chủ home admin";
        return view('admin.home.index', compact('title'));
    }
}
