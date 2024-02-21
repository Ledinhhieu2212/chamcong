<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $title = "Quản lý lịch làm nhân viên";
        $accounts1 = User::pluck('fullname', 'id');
        $users_array = User::all();
        return view('admin.calendar.index', compact('title', 'users_array', 'accounts1'));
    }

}
