<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
class HomeController extends Controller
{

    public function index()
    {
        $title  = 'Trang chủ admin';
        $template = 'admin.home.dashboard.index';
        return view('admin.home.layout', compact('template','title'));
    }
}
