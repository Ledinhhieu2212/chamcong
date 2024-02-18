<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimekeepController extends Controller
{
    public function index()
    {
        $title = "Quản lý chấm công nhân viên";
        return view('admin.timekeep.index', compact('title'));
    }
}
