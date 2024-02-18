<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $title = "Quản lý lịch làm nhân viên";
        return view('admin.calendar.index', compact('title'));
    }

}
